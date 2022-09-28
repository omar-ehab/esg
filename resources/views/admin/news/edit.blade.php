@extends('layouts.admin.app')
@section('title', 'Edit News')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.news.index') }}" class="fw-light">News
                /</a>
            Edit News
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.news.update', $news->slug) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="title">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title', $news->title) }}"
                                           placeholder="News Title"/>
                                    @error('title')
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
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Choose new image to replace old one with it
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        News Image should be 560x380
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="short_description">
                                        Short Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('short_description') is-invalid @enderror"
                                           id="short_description"
                                           name="short_description"
                                           value="{{ old('short_description', $news->short_description) }}"
                                           placeholder="Short Description"/>
                                    @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label"
                                           for="content">
                                        Content
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="content" id="content" class="form-control"
                                              rows="7">{{ old('content', $news->content) }}</textarea>
                                    @error('content')
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
            min-height: 200px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('admin/vendor/libs/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
