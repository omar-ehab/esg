@extends('layouts.admin.app')
@section('title', 'Edit Scope Of Activity')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.scope-of-activities.index') }}" class="fw-light">Scope of
                Activities
                /</a>
            Edit Scope of Activity
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.scope-of-activities.update', $scopeOfActivity->slug) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <h4>Scope Of Activity Banner</h4>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="image"
                                                   class="form-label @error('scope_of_activity_banner_image') text-danger @enderror">
                                                Image
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input
                                                class="form-control @error('scope_of_activity_banner_image') is-invalid @enderror"
                                                type="file"
                                                id="scope_of_activity_banner_image"
                                                name="scope_of_activity_banner_image" accept="image/*"/>
                                            <div id="defaultFormControlHelp" class="form-text">
                                                Banner width should be 1920px
                                            </div>
                                            @error('scope_of_activity_banner_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', $scopeOfActivity->name) }}"
                                           placeholder="Scope Of Activity Name"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="icon" class="form-label @error('icon') text-danger @enderror">
                                        Icon
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('icon') is-invalid @enderror" type="file"
                                           id="icon"
                                           name="icon" accept="image/*"/>
                                    @error('icon')
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
                                              rows="5">{{ old('description', $scopeOfActivity->description) }}</textarea>
                                    @error('description')
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

@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 350px;
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
