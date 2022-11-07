@extends('layouts.admin.app')
@section('title', 'Create Service Item')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.services.index') }}" class="fw-light">Services
                /</a> <a href="{{ route('admin.items.index', $service->slug) }}" class="fw-light">{{ $service->name }}
                /</a>
            Add New Service Item
        </h4>
        <!-- Basic Layout -->
        @include('layouts.admin.partials._session')
        <form action="{{ route('admin.items.store', $service->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="title">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title') }}"
                                           placeholder="Service Item Title"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label @error('image_path') text-danger @enderror"
                                           for="image_path">
                                        Service Item Image
                                    </label>
                                    <input class="form-control @error('image_path') is-invalid @enderror"
                                           type="file"
                                           id="image_path"
                                           name="image_path" accept="image/*"/>
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
    <script src="{{ asset('admin/vendor/libs/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
