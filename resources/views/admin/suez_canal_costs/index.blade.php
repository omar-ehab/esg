@extends('layouts.admin.app')
@section('title', 'Suez Canal Costs')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Suez Canal Costs /</span> All
                    Suez Canal Costs
                </h4>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Suez Canal Costs</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered"
                       style=""
                       id="table1">
                    @foreach($shipTypes as $i => $shipType)
                        <thead>
                        <tr>
                            <th colspan="14"
                                style="text-align: center;background-color:#5F61E6; color: white">({{ $i+1 }}
                                ){{ $shipType->name }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($shipType->costs as $cost)

                                <th style="text-align: center;"
                                    colspan="2">{{$cost->slice}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($shipType->costs as $cost)

                                <th style="text-align: center;">laden</th>
                                <th style="text-align: center;">Ballest</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($shipType->costs as $cost)
                                <th style="text-align: center;">
                                    {{$cost->laden_cost}}
                                </th>
                                <th style="text-align: center;">{{$cost->ballest_cost}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($shipType->costs as $cost)
                                <th style="text-align: center;" colspan="2">

                                    <a href="{{route('admin.suez_canal_costs.edit',$cost->id )}}"
                                       class="btn btn-sm btn-primary">
                                        <i class="icon-plus"></i> Edit Cost
                                    </a>

                                </th>
                            @endforeach
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
