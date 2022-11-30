@extends('layouts.admin.app')
@section('title', 'Our Offices')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Our Offices /</span> All
                    Offices
                </h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.our-offices.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>
                    Add
                </a>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Offices Map</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($offices as $office)
                        <tr>
                            <td>{{ $office->name }}</td>
                            <td>{{ $office->address }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.our-offices.edit', $office->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>

                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmation"
                                            data-bs-office-id="{{ $office->id }}"
                                    >
                                        <i class="bx bx-trash-alt me-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no offices!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Offices Map</div>
            @if(strlen($map_image))
                <div class="row mb-3 justify-content-center">
                    <img src="{{ asset('storage/' . $map_image) }}" alt="Offices Map Image" class="img-rounded"
                         style="max-width: 500px">
                </div>
            @endif

            <div class="card-body">
                <hr/>
                <form action="{{ route('admin.our-offices.update_offices_map') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
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
                        <div class="col-sm-12 mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </form>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Office !</h5>
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
                    <div class="modal-body">are you sure you want to delete office?</div>
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
            const officeId = button.getAttribute('data-bs-office-id')
            const url = `/dashboard/our-offices/${officeId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
