@extends('layouts.admin.app')
@section('title', 'Careers')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Careers /</span> All
                    Careers
                </h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.careers.export') }}" class="btn btn-primary">
                    <i class="bx bx-spreadsheet me-1"></i>
                    Export
                </a>
            </div>
        </div>
        <form action="">
            <div class="row mb-3">
                <div class="d-inline-block col-md-3 col-sm-6">
                    <label for="job">Job</label>
                    <select name="job" id="job" class="form-control">
                        <option
                            value="all" {{ !request()->has('job') || request()->get('job') == 'all' ? 'selected' : '' }}>
                            All
                        </option>
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ request()->get('job') == $job->id ? 'selected' : '' }}>
                                {{ ucfirst($job->name) }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="d-flex align-items-end col-sm-3 col-xs-4 ">
                    <button type="submit" class="btn btn-primary d-inline-block mx-md-3 mt-md-0 mx-sm-0 mt-3">
                        <i class="bx bx-filter-alt me-1"></i>
                        filter
                    </button>
                </div>
            </div>
        </form>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Careers</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">National Id</th>
                        <th scope="col">Job</th>
                        <th scope="col">CV</th>
                        <th scope="col">Sent At</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($careers as $career)
                        <tr>
                            <td>{{ $career->first_name }}</td>
                            <td>{{ $career->last_name }}</td>
                            <td>
                                <a href="tel:{{ $career->phone }}">{{ $career->phone }}</a>
                            </td>
                            <td>{{ $career->national_id }}</td>
                            <td>{{ $career->job->name }}</td>
                            <td><a href="{{ asset('storage/' . $career->cv_path) }}"
                                   download="{{ $career->first_name . '_' . $career->last_name }}" target="_blank">Download</a>
                            </td>
                            <td>{{ $career->created_at->format('d/m/Y h:m A') }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmation"
                                            data-bs-career-id="{{ $career->id }}"
                                    >
                                        <i class="bx bx-trash-alt me-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no careers!</td>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Career !</h5>
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
                    <div class="modal-body">are you sure you want to delete career?</div>
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
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/select2/select2.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('admin/vendor/libs/select2/select2.js') }}"></script>
    <script>
        $('#job').select2();
    </script>
    <script>
        const deleteConfirmationModal = document.getElementById('deleteConfirmation')
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const careerId = button.getAttribute('data-bs-career-id')
            const url = `/dashboard/careers/${careerId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
