@extends('layouts.admin.app')
@section('title', 'Certificates')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Certificates /</span> All
                    Certificates
                </h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>
                    Add
                </a>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Certificates</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($certificates as $certificate)
                        <tr>
                            <td>
                                <img class="certificates-image" src="{{ asset('storage/' . $certificate->image_path) }}"
                                     alt="{{ $certificate->name }}">
                            </td>
                            <td>{{ $certificate->name }}</td>
                            <td>
                                @if($certificate->link)
                                    <a href="{{ $certificate->link }}" target="_blank">{{ $certificate->link }}</a>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.certificates.edit', $certificate->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>

                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmation"
                                            data-bs-certificate-id="{{ $certificate->id }}"
                                    >
                                        <i class="bx bx-trash-alt me-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no certificates!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Certificate !</h5>
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
                    <div class="modal-body">are you sure you want to delete certificate?</div>
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
@push('styles')
    <style>
        .certificates-image {
            max-width: 80px;
            border-radius: 0.5rem;
        }
    </style>
@endpush
@push('scripts')
    <script>
        const deleteConfirmationModal = document.getElementById('deleteConfirmation')
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const certificateId = button.getAttribute('data-bs-certificate-id')
            const url = `/dashboard/certificates/${certificateId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
