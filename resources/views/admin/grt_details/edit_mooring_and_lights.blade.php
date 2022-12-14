@extends('layouts.admin.app')
@section('title', 'Edit Mooring and Lights')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.pilotage_dues.index') }}" class="fw-light">Grt Details
                /</a>
            Edit Mooring and Lights
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form
                            action="{{ route('admin.grt_details.mooring_and_lights.update_mooring_and_lights', $mooring_and_lights->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="launch">
                                        Mooring launch
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           autocomplete="off"
                                           class="form-control @error('launch') is-invalid @enderror"
                                           id="launch"
                                           name="launch"
                                           value="{{ old('launch', $mooring_and_lights->launch) }}"
                                           placeholder="Mooring launch"/>
                                    @error('launch')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="projector">
                                        Projector or Electrician
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           autocomplete="off"
                                           class="form-control @error('projector') is-invalid @enderror"
                                           id="projector"
                                           name="projector"
                                           value="{{ old('projector', $mooring_and_lights->projector) }}"
                                           placeholder="Projector or Electrician"/>
                                    @error('projector')
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
