@extends('layouts.admin.app')
@section('title', 'Edit Equipment')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.equipment.index') }}" class="fw-light">Equipment /</a>
            Edit Equipment
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                @include('layouts.admin.partials._session')
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.equipment.update', $equipment->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('name') text-danger @enderror" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', $equipment->name) }}"
                                           placeholder="Job Name"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="image" class="form-label @error('image') text-danger @enderror">
                                        Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                           id="image"
                                           name="image" accept="image/*"/>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i>
                                Save
                            </button>
                        </form>
                        <hr/>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p>Equipment Details</p>
                            </div>
                            <div class="col-12" id="rows_container">
                                @foreach($equipment->details as $detail)
                                    <form
                                        action="{{ route('admin.equipment.update_equipment_details', ['equipment' => $equipment->id, 'equipmentDetail' => $detail->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mt-2 align-items-center">

                                            <div class="col-lg-4 col-sm-6">
                                                <input type="text" name="key" class="form-control"
                                                       value="{{ $detail->key }}"/>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <input type="text" name="first_value" class="form-control"
                                                       value="{{ $detail->first_value }}"/>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <input type="text" name="second_value" class="form-control"
                                                       value="{{ $detail->second_value }}"/>
                                            </div>
                                            <div class="col-lg-1 col-sm-2">

                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    <i class="bx bx-edit me-1"></i>
                                                    save
                                                </button>
                                            </div>
                                            <div class="col-lg-1 col-sm-2">
                                                <button type="button"
                                                        class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteConfirmation"
                                                        data-bs-equipment-detail-id="{{ $detail->id }}"
                                                        data-bs-equipment-id="{{ $equipment->id }}"
                                                >
                                                    <i class="bx bx-trash-alt me-1"></i>
                                                    delete
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="modal fade"
        id="deleteConfirmation"
        aria-labelledby="deleteConfirmationLabel"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Equipment Detail !</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">are you sure you want to delete equipment detail?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger" id="delete-btn" formaction="">
                            <i class="bx bx-trash-alt me-1"></i>
                            Yes, Delete it
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const deleteConfirmationModal = document.getElementById('deleteConfirmation')
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const equipmentDetailId = button.getAttribute('data-bs-equipment-detail-id')
            const equipmentId = button.getAttribute('data-bs-equipment-id')
            const url = `/dashboard/equipment/${equipmentId}/destroy/${equipmentDetailId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
