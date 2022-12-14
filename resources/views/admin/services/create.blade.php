@extends('layouts.admin.app')
@section('title', 'Create Services')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.services.index') }}" class="fw-light">Services
                /</a>
            Add New Service
        </h4>
        <!-- Basic Layout -->
        @include('layouts.admin.partials._session')
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Service Banner</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('service_banner_title') text-danger @enderror"
                                           for="service_banner_title">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('service_banner_title') is-invalid @enderror"
                                           id="service_banner_title"
                                           name="service_banner_title"
                                           value="{{ old('service_banner_title') }}"
                                           placeholder="Banner Title"/>
                                    @error('service_banner_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="image"
                                           class="form-label @error('service_banner_image') text-danger @enderror">
                                        Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('service_banner_image') is-invalid @enderror"
                                           type="file"
                                           id="service_banner_image"
                                           name="service_banner_image" accept="image/*"/>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Banner width should be 1920px
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-body">

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
                                           placeholder="Service Name"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('parent_service') text-danger @enderror"
                                           for="parent_service">
                                        Parent Service
                                    </label>
                                    <select name="parent_service" id="parent_service" class="form-control">
                                        <option value="0">None</option>
                                        @foreach($parents as $parent)
                                            <option
                                                value="{{ $parent->id }}" {{ old('parent_service') == $parent->id ? 'selected' : ''}}>
                                                {{ $parent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_service')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label"
                                           for="description">
                                        Description
                                    </label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i>
                                Save
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('admin/vendor/libs/ckeditor/full-ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
