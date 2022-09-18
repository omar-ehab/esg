@extends('layouts.admin.app')
@section('title', $banner->page->name . ' Banner')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.banners.index') }}" class="fw-light">Banners /</a>
            {{ $banner->page->name . ' Banner' }}
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
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="w-25">#</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $banner->title }}</td>
                            </tr>
                            <tr>
                                <td>Page</td>
                                <td>
                                    <a href="{{ $banner->page->url }}">{{ $banner->page->name }}</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning"
                           href="{{ route('admin.banners.edit', $banner->id) }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
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
            border-radius: 0.375rem;
        }
    </style>
@endpush
