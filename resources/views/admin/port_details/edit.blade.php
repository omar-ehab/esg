@extends('layouts.admin.app')
@section('title', 'Edit Port Details')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.ports.index') }}" class="fw-light">Egyptian Sea Ports
                /</a>
            <a href="{{ route('admin.ports.show', $port->slug) }}" class="fw-light"> {{ $port->name }}
                /
            </a>
            Edit Port Details
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form
                            action="{{ route('admin.port-details.update', ['port' => $port->slug, 'portDetails' => $portDetails->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="name">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title', $portDetails->name) }}"
                                           placeholder="Details Title"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label"
                                           for="description">
                                        Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="7">{{ old('description', $portDetails->description) }}</textarea>
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
