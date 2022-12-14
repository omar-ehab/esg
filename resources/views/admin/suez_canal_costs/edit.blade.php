@extends('layouts.admin.app')
@section('title', 'Edit Suez Canal Costs')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.suez_canal_costs.index') }}" class="fw-light">Suez Canal
                Costs
                /</a>
            Edit Cost For {{ $cost->shipType->name }} ({{ $cost->slice }})
        </h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.suez_canal_costs.update', $cost->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="laden_cost">
                                        Laden Cost
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="laden_cost"
                                           name="laden_cost"
                                           value="{{ old('laden_cost', $cost->laden_cost) }}"
                                           placeholder="Laden Cost"/>
                                    @error('laden_cost')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="ballest_cost">
                                        Ballest Cost
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('ballest_cost') is-invalid @enderror"
                                           id="ballest_cost"
                                           name="ballest_cost"
                                           value="{{ old('ballest_cost', $cost->ballest_cost) }}"
                                           placeholder="Ballest Cost"/>
                                    @error('ballest_cost')
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
