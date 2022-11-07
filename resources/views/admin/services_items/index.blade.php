@extends('layouts.admin.app')
@section('title', $service->name . ' Items')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> <span
                        class="text-muted fw-light">{{ $service->name }} Items /</span> All
                    Service items
                </h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.items.create', $service->slug) }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>
                    Add
                </a>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Service Items</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($service->items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.items.edit', ['service' => $service->slug, 'item' => $item->slug]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>

                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmation"
                                            data-bs-service-slug="{{ $service->slug }}"
                                            data-bs-service-item-slug="{{ $item->slug }}"
                                    >
                                        <i class="bx bx-trash-alt me-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no service items!</td>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Service Item !</h5>
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
                    <div class="modal-body">are you sure you want to delete service item?</div>
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
            const serviceSlug = button.getAttribute('data-bs-service-slug')
            const itemSlug = button.getAttribute('data-bs-service-item-slug')
            const url = `/dashboard/services/${serviceSlug}/items/${itemSlug}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
