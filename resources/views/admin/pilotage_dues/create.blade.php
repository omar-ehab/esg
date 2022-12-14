@extends('layouts.admin.app')
@section('title', 'Create Pilotage Dues')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.pilotage_dues.index') }}" class="fw-light">Pilotage Dues
                /</a>
            Add Pilotage Dues
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.pilotage_dues.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="scnt_from">
                                        From (SCNT)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('scnt_from') is-invalid @enderror"
                                           id="scnt_from"
                                           name="scnt_from"
                                           value="{{ old('scnt_from') }}"
                                           placeholder="From (SCNT)"/>
                                    @error('scnt_from')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="scnt_to">
                                        To (SCNT)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('scnt_to') is-invalid @enderror"
                                           id="scnt_to"
                                           name="scnt_to"
                                           value="{{ old('scnt_to') }}"
                                           placeholder="To (SCNT)"/>
                                    @error('scnt_to')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="north_val1">
                                        North 1
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('north_val1') is-invalid @enderror"
                                           id="north_val1"
                                           name="north_val1"
                                           value="{{ old('north_val1') }}"
                                           placeholder="North 1"/>
                                    @error('north_val1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="north_val2">
                                        North 2
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('north_val2') is-invalid @enderror"
                                           id="north_val2"
                                           name="north_val2"
                                           value="{{ old('north_val2') }}"
                                           placeholder="North 2"/>
                                    @error('north_val2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="south_val1">
                                        South 1
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('south_val1') is-invalid @enderror"
                                           id="south_val1"
                                           name="south_val1"
                                           value="{{ old('south_val1') }}"
                                           placeholder="South 1"/>
                                    @error('south_val1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="south_val2">
                                        South 2
                                    </label>
                                    <input type="number"
                                           autocomplete="off"
                                           class="form-control @error('south_val2') is-invalid @enderror"
                                           id="south_val2"
                                           name="south_val2"
                                           value="{{ old('south_val2') }}"
                                           placeholder="South 2"/>
                                    @error('south_val2')
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
