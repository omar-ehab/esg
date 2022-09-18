@extends('layouts.admin.app')
@section('title', 'Profile | ' . auth()->user()->name)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Profile
        </h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <h5 class="card-header">Update basic data</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.change_data') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12 col-lg-6 mb-3">
                                    <label class="form-label @error('name') text-danger @enderror"
                                           for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', auth()->user()->name) }}"
                                           placeholder="User Name"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-edit me-1"></i>
                                Change
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Change password</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.change_password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label @error('name') text-danger @enderror"
                                           for="password">
                                        New Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               id="password" placeholder="············" aria-describedby="password">
                                        <span id="password" class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label @error('password_confirmation') text-danger @enderror"
                                           for="password_confirmation">
                                        New Password Confirmation
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation"
                                               class="form-control @error('password') is-invalid @enderror"
                                               id="password_confirmation" placeholder="············"
                                               aria-describedby="password_confirmation">
                                        <span id="password_confirmation" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-edit me-1"></i>
                                Change
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
