@extends('layouts.admin.app')
@section('title', 'Create Maritime Law')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.maritime_laws.index') }}" class="fw-light">Maritime Laws
                /</a>
            Add New Maritime Law
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.maritime_laws.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('title') text-danger @enderror" for="title">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title') }}"
                                           placeholder="Maritime Law Title"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="pdf_file" class="form-label @error('pdf_file') text-danger @enderror">
                                        PDF File
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('pdf_file') is-invalid @enderror" type="file"
                                           id="pdf_file"
                                           name="pdf_file" accept="application/pdf"/>
                                    @error('pdf_file')
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
