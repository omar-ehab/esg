@extends('layouts.admin.app')
@section('title', 'Edit ' . $banner->page->name . ' banner')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.banners.index') }}" class="fw-light">Banners /</a>
            {{ 'Edit ' . $banner->page->name . ' banner' }}
        </h4>
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-center">
                <img
                    src="{{ asset('storage/' . $banner->image_path) }}"
                    alt="{{ $banner->title }}"
                    class="banner-image"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('title') text-danger @enderror" for="title">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title', $banner->title) }}"
                                           placeholder="Banner Title"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('page_id') text-danger @enderror" for="page_id">
                                        Page
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="page_id" id="page_id" class="form-control">
                                        @foreach($pages as $page)
                                            <option
                                                value="{{ $page->id }}" {{ $banner->page_id == $page->id ? 'selected' : '' }}>
                                                {{ $page->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('page_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label for="image" class="form-label @error('image') text-danger @enderror">
                                        Image
                                    </label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                           id="image"
                                           name="image" accept="image/*"/>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Choose new image to replace old one with it
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Banner width should be 1920px
                                    </div>
                                    @error('image')
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
        .banner-image {
            width: 1280px;
            border-radius: 5px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/select2/select2.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('admin/vendor/libs/select2/select2.js') }}"></script>
    <script>
        $('#page_id').select2();
    </script>
@endpush
