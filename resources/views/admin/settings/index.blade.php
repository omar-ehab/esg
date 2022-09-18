@extends('layouts.admin.app')
@section('title', 'Settings')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Settings</h4>
        @include('layouts.admin.partials._session')
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <h5 class="card-header">Contact Information</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.contact_information') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-md-6 mb-3">
                                    <label for="address" class="form-label @error('address') text-danger @enderror">
                                        Address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           id="address"
                                           name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{ old('address', $address) }}"
                                           aria-label="Address"/>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-6 mb-3">
                                    <label for="email"
                                           class="form-label @error('email') text-danger @enderror">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           value="{{ old('email', $email) }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           aria-label="email"/>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-6 mb-3">
                                    <label for="phone"
                                           class="form-label @error('phone') text-danger @enderror">
                                        Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           id="phone"
                                           name="phone"
                                           value="{{ old('phone', $phone) }}"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           aria-label="phone"/>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save me-1"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <h5 class="card-header">Social Links</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.social_media') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-md-6 mb-3">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" @error('facebook') style="border-color: #ff3e1d" @enderror>
                                            <i class="bx bxl-facebook-circle"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control @error('facebook') is-invalid @enderror"
                                               name="facebook"
                                               value="{{ old('facebook', $facebook) }}"
                                               aria-label="Facebook page link"/>
                                    </div>
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xs-12 col-md-6 mb-3">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" @error('linkedin') style="border-color: #ff3e1d" @enderror>
                                            <i class="bx bxl-linkedin"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control @error('linkedin') is-invalid @enderror"
                                               name="linkedin"
                                               value="{{ old('linkedin', $linkedin) }}"
                                               aria-label="LinkedIn link"/>
                                    </div>
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
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
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .og_image {
            max-width: 600px;
            border-radius: 5px;
        }
    </style>
@endpush
