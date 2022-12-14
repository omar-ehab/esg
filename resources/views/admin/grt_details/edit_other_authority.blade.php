@extends('layouts.admin.app')
@section('title', 'Edit Other Authority')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.pilotage_dues.index') }}" class="fw-light">Grt Details
                /</a>
            Edit Other Authority
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form
                            action="{{ route('admin.grt_details.other_authorities.update_other_authorities', $other_authority->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="tariif">
                                        Tariff
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           autocomplete="off"
                                           class="form-control @error('tariif') is-invalid @enderror"
                                           id="tariif"
                                           name="tariif"
                                           value="{{ old('tariif', $other_authority->tariif) }}"
                                           placeholder="Tariff"/>
                                    @error('tariif')
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
