@extends('layouts.admin.app')
@section('title', 'GRT Details')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-between">
            <div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">GRT Details /</span> All
                    GRT Details
                </h4>
            </div>
        </div>
        @include('layouts.admin.partials._session')
        <div class="card">
            <h5 class="card-header">Mooring & Projector</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">GRT</th>
                        <th scope="col">Mooring launch</th>
                        <th scope="col">Projector or Electrician</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($mooringAndLights as $mooringAndLight)
                        <tr>
                            <td>GRT From <span class="mx-1"
                                               style="font-weight: bold">{{ $mooringAndLight->grt_from }}</span> To
                                @if($mooringAndLight->grt_to)
                                    <span class="mx-1" style="font-weight: bold">{{ $mooringAndLight->grt_to }}</span>
                                @else
                                    -----
                                @endif
                            </td>
                            <td>
                                {{$mooringAndLight->launch}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                {{$mooringAndLight->projector}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                {{$mooringAndLight->launch + $mooringAndLight->projector}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.mooring_and_lights.edit', $mooringAndLight->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no Mooring & Projector!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Eams</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tariff</th>
                        <th>Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($eams as $eam)
                        <tr>
                            <td>{{$eam->name}}</td>
                            <td>
                                {{$eam->tariif}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            @if($eam->name == 'رسم المنائر')
                                <td style="BACKGROUND-COLOR: YELLOW"> {{$eam->tariif}}
                                    <span style="font-weight: bold">USD </span> * GRT
                                </td>
                            @else
                                <td>
                                    {{$eam->tariif}} <span style="font-weight: bold">USD </span>
                                </td>

                            @endif
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.eams.edit', $eam->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no Eams!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Port Authority</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tariff</th>
                        <th>Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($ports as $port)
                        <tr>
                            <td class='hidden-480'>{{$port->name}}</td>
                            <td class='hidden-480'>
                                @if($port->tariif)
                                    {{$port->tariif}} <span style="font-weight: bold">USD </span>
                                @else
                                    @if($port->name == 'اتعاب الوكاله الملاحية')

                                        <a style="color:red" href="#shipping_agency_fees">According To Shipping Agency
                                            Fees Table</a>
                                    @else
                                        <a style="color:red" href="#usufruct">According To Usufruct Table</a>

                                    @endif
                                @endif
                            </td>
                            @if($port->name == 'رسم الميناء')
                                <td style="BACKGROUND-COLOR: YELLOW"> {{ $port->tariif }} <span
                                        style="font-weight: bold">USD </span> * GRT
                                </td>
                            @else
                                @if($port->tariif)
                                    <td>{{ $port->tariif }} <span style="font-weight: bold">USD </span>
                                    </td>
                                @else
                                    <td style="BACKGROUND-COLOR: YELLOW">
                                        @if($port->name == 'اتعاب الوكاله الملاحية')

                                            <a style="color:red" href="#shipping_agency_fees">According To Shipping
                                                Agency Fees Table</a>
                                        @else
                                            <a style="color:red" href="#usufruct">According To Usufruct Table</a>

                                        @endif
                                        * GRT
                                    </td>
                                @endif
                            @endif
                            @if($port->tariif )
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-warning btn-sm mx-3"
                                           href="{{ route('admin.grt_details.port_authorities.edit', $port->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">There is no Port Authorities!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Shipping Agency Fees</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Statement</th>
                        <th>Tariif</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tr>
                        <td colspan="5" style="text-align: center;border:2px solid black;background-color:#ccccbb;">
                            Item (1-1) Gross Registered Tonnage G.R.T vessels
                        </td>
                    </tr>
                    @foreach($allShippingAgencyFees as $i => $allShippingAgencyFee)
                        <tr>
                            <td>1 – 1 – {{ $i + 1 }}</td>
                            <td>
                                {{ $allShippingAgencyFee->title }}
                            </td>
                            <td>
                                {{ $allShippingAgencyFee->tariif }}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.shipping_agency_fees.edit', $allShippingAgencyFee->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="5" style="text-align: center;border:2px solid black;background-color:#ccccbb;">
                            Item (1-2) Tourist and Passenger Vessels
                        </th>
                    </tr>
                    @foreach($passengerShippingAgencyFees as $j => $passengerShippingAgencyFee)
                        <tr>
                            <td>1 – 1 – {{ $j + 1 }}</td>
                            <td>
                                {{$passengerShippingAgencyFee->title}}
                            </td>
                            <td>
                                {{ $passengerShippingAgencyFee->tariif }}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.shipping_agency_fees.edit', $passengerShippingAgencyFee->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Usufruct</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">GRT</th>
                        <th scope="col">Tariif</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($usufructs as $usufruct)
                        <tr>
                            <td>
                                {{$usufruct->title}}
                            </td>
                            <td>
                                {{$usufruct->tariif}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.usufruct.edit', $usufruct->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Other Authorities</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Tariif</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($others as $other)
                        <tr>
                            <td>
                                {{$other->title}}
                            </td>
                            <td>
                                {{$other->tariif}}
                                <span style="font-weight: bold">USD </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm mx-3"
                                       href="{{ route('admin.grt_details.other_authorities.edit', $other->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
