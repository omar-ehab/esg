@extends('layouts.admin.app')
@section('title', $port->name . ' Port')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.ports.index') }}" class="fw-light">Egyptian Sea Ports
                /</a>
            {{ $port->name }}
        </h4>
        @include('layouts.admin.partials._session')
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">{{ $port->name }}</h3>
                    </div>
                    <div class="card-body">
                        @if($port->description)
                            <p>{{ $port->description }}</p>
                        @endif
                        <a class="btn btn-sm btn-warning"
                           href="{{ route('admin.ports.edit', $port->slug) }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h5 class="m-0">Details</h5>
                            <a href="{{ route('admin.port-details.create', $port->slug) }}"
                               class="btn btn-sm btn-primary">
                                Add Details
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th class="w-25">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($port->details as $detail)
                                <tr>
                                    <td>{{ $detail->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-warning btn-sm mx-3"
                                               href="{{ route('admin.port-details.edit', ['port' => $port->slug, 'portDetails' => $detail->id]) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>

                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmation"
                                                    data-bs-port-slug="{{ $port->slug }}"
                                                    data-bs-port-details-id="{{ $detail->id }}"
                                            >
                                                <i class="bx bx-trash-alt me-1"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">There is no details!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Port Detail !</h5>
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
                    <div class="modal-body">are you sure you want to delete port detail?</div>
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
            const portSlug = button.getAttribute('data-bs-port-slug')
            const portDetailId = button.getAttribute('data-bs-port-details-id')
            const url = `/dashboard/ports/${portSlug}/port-details/${portDetailId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
