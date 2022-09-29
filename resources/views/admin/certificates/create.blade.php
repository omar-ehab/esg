@extends('layouts.admin.app')
@section('title', 'Create Certificate')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.certificates.index') }}" class="fw-light">Certificates
                /</a>
            Add Certificate
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.certificates.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Certificate Name"/>
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
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="link">
                                        Certificate Link
                                    </label>
                                    <input type="text"
                                           class="form-control @error('link') is-invalid @enderror"
                                           id="link"
                                           name="link"
                                           value="{{ old('link') }}"
                                           placeholder="Certificate Link"/>
                                    @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i>
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
