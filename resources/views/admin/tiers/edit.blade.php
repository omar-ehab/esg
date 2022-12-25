@extends('layouts.admin.app')
@section('title', 'Edit Tier')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.tiers.index') }}" class="fw-light">Tiers
                /</a>
            Edit Tier
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.tiers.update', $tier->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="number">
                                        Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="1"
                                           autocomplete="off"
                                           class="form-control @error('number') is-invalid @enderror"
                                           id="number"
                                           name="number"
                                           value="{{ old('number', $tier->number) }}"
                                           placeholder="Tier Number"/>
                                    @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="southbound_percentage">
                                        Southbound Percentage
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           autocomplete="off"
                                           class="form-control @error('southbound_percentage') is-invalid @enderror"
                                           id="southbound_percentage"
                                           name="southbound_percentage"
                                           value="{{ old('southbound_percentage', $tier->southbound_percentage) }}"
                                           placeholder="Tier Southbound Percentage"/>
                                    @error('southbound_percentage')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="northbound_percentage">
                                        Northbound Percentage
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           autocomplete="off"
                                           class="form-control @error('northbound_percentage') is-invalid @enderror"
                                           id="northbound_percentage"
                                           name="northbound_percentage"
                                           value="{{ old('northbound_percentage', $tier->northbound_percentage) }}"
                                           placeholder="Tier Northbound Percentage"/>
                                    @error('northbound_percentage')
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
