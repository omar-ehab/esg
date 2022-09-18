@extends('layouts.admin.app')
@section('title', 'Inquiries')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inquiries /</span> All
                    Inquiries</h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.inquiries.export') }}" class="btn btn-primary">
                    <i class="bx bx-spreadsheet me-1"></i>
                    Export
                </a>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Inquiries</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>
                        <th scope="col">Service</th>
                        <th scope="col">Country</th>
                        <th scope="col">Message</th>
                        <th scope="col">Sent At</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($inquiries as $inquiry)
                        <tr>
                            <td>{{ $inquiry->name }}</td>
                            <td>
                                <a href="mailto:{{ $inquiry->email }}" target="_blank">{{ $inquiry->email }}</a>
                            </td>
                            <td>
                                <a href="tel:{{ $message->mobile }}" target="_blank">{{ $message->mobile }}</a>
                            </td>
                            <td>{{ $inquiry->company }}</td>
                            <td>{{ $inquiry->service }}</td>
                            <td>{{ $inquiry->country->name }}</td>
                            <td>
                                <p title="{{ $inquiry->message }}">{{  \Illuminate\Support\Str::limit($inquiry->message, 30) }}</p>
                            </td>
                            <td>{{ $inquiry->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#messageDetails"
                                            data-bs-name="{{ $inquiry->name }}"
                                            data-bs-mobile="{{ $inquiry->mobile }}"
                                            data-bs-email="{{ $inquiry->email }}"
                                            data-bs-company="{{ $inquiry->company }}"
                                            data-bs-service="{{ $inquiry->service }}"
                                            data-bs-country="{{ $inquiry->country->name }}"
                                            data-bs-message="{{ $inquiry->message }}"
                                    >
                                        <i class="bx bx-show me-1"></i>
                                        view
                                    </button>
                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmation"
                                            data-bs-career-id="{{ $inquiry->id }}"
                                    >
                                        <i class="bx bx-trash-alt me-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no inquiries!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div
        class="modal fade"
        id="messageDetails"
        aria-labelledby="messageDetailsLabel"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageDetailsLabel">Message Details</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">

                        <tbody>
                        <tr>
                            <td>first name</td>
                            <td id="modal-first-name"></td>
                        </tr>
                        <tr>
                            <td>last name</td>
                            <td id="modal-last-name"></td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td id="modal-email"></td>
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td id="modal-phone"></td>
                        </tr>
                        <tr>
                            <td>company</td>
                            <td id="modal-company"></td>
                        </tr>
                        <tr>
                            <td>country</td>
                            <td id="modal-country"></td>
                        </tr>
                        <tr>
                            <td>message</td>
                            <td id="modal-message"></td>
                        </tr>
                        </tbody>
                    </table>
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
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Inquiry !</h5>
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
                    <div class="modal-body">are you sure you want to delete inquiry?</div>
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
        const messageDetailsModal = document.getElementById('messageDetails')
        messageDetailsModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const name = button.getAttribute('data-bs-name')
            const mobile = button.getAttribute('data-bs-mobile')
            const email = button.getAttribute('data-bs-email')
            const company = button.getAttribute('data-bs-company')
            const service = button.getAttribute('data-bs-service')
            const country = button.getAttribute('data-bs-country')
            const message = button.getAttribute('data-bs-message')


            const modalName = messageDetailsModal.querySelector('#modal-name')
            const modalMobile = messageDetailsModal.querySelector('#modal-mobile')
            const modalEmail = messageDetailsModal.querySelector('#modal-email')
            const modalCompany = messageDetailsModal.querySelector('#modal-company')
            const modalService = messageDetailsModal.querySelector('#modal-service')
            const modalCountry = messageDetailsModal.querySelector('#modal-country')
            const modalMessage = messageDetailsModal.querySelector('#modal-message')

            modalName.textContent = name
            modalMobile.textContent = mobile
            modalEmail.textContent = email
            modalService.textContent = service
            modalCompany.textContent = company
            modalCountry.textContent = country
            modalMessage.textContent = message
        });
        //delete confirmation script
        const deleteConfirmationModal = document.getElementById('deleteConfirmation')
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const inquiryId = button.getAttribute('data-bs-career-id')
            const url = `/dashboard/inquiries/${inquiryId}`
            const submitBtn = document.getElementById('delete-btn')
            submitBtn.setAttribute('formaction', url);
        });
    </script>
@endpush
