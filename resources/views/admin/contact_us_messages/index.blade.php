@extends('layouts.admin.app')
@section('title', 'Contact Us Messages')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact us messages /</span> All
                    Messages</h4>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.contact-us-messages.export') }}" class="btn btn-primary">
                    <i class="bx bx-spreadsheet me-1"></i>
                    Export
                </a>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Messages</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Sent At</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->first_name }}</td>
                            <td>{{ $message->last_name }}</td>
                            <td>
                                <a href="mailto:{{ $message->email }}" target="_blank">{{ $message->email }}</a>
                            </td>
                            <td>
                                <a href="tel:{{ $message->phone }}" target="_blank">{{ $message->phone }}</a>
                            </td>
                            <td>
                                <p title="{{ $message->message }}"
                                   class="m-0">{{  \Illuminate\Support\Str::limit($message->message, 30) }}</p>
                            </td>
                            <td>{{ $message->created_at->diffForHumans() }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#messageDetails"
                                        data-bs-first-name="{{ $message->first_name }}"
                                        data-bs-last-name="{{ $message->last_name }}"
                                        data-bs-email="{{ $message->email }}"
                                        data-bs-phone="{{ $message->phone }}"
                                        data-bs-company="{{ $message->company }}"
                                        data-bs-country="{{ $message->country->name }}"
                                        data-bs-message="{{ $message->message }}"
                                >
                                    <i class="bx bx-show me-1"></i>
                                    view
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no messages!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @if($messages->hasPages())
                <div class="d-flex justify-content-center mt-5 mb-3">
                    {{ $messages->links() }}
                </div>
            @endif
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
@endsection

@push('scripts')
    <script>
        const messageDetailsModal = document.getElementById('messageDetails')
        messageDetailsModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const first_name = button.getAttribute('data-bs-first-name')
            const last_name = button.getAttribute('data-bs-last-name')
            const email = button.getAttribute('data-bs-email')
            const phone = button.getAttribute('data-bs-phone')
            const company = button.getAttribute('data-bs-company')
            const country = button.getAttribute('data-bs-country')
            const message = button.getAttribute('data-bs-message')


            const modalFirstName = messageDetailsModal.querySelector('#modal-first-name')
            const modalLastName = messageDetailsModal.querySelector('#modal-last-name')
            const modalEmail = messageDetailsModal.querySelector('#modal-email')
            const modalPhone = messageDetailsModal.querySelector('#modal-phone')
            const modalCompany = messageDetailsModal.querySelector('#modal-company')
            const modalCountry = messageDetailsModal.querySelector('#modal-country')
            const modalMessage = messageDetailsModal.querySelector('#modal-message')

            modalFirstName.textContent = first_name
            modalLastName.textContent = last_name
            modalEmail.textContent = email
            modalPhone.textContent = phone
            modalCompany.textContent = company
            modalCountry.textContent = country
            modalMessage.textContent = message
        });
    </script>
@endpush
