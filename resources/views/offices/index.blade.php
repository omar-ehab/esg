@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="map-area relative">
                            <h3>You Can Find Our Offices</h3>

                            <div class="row">
                                @foreach($offices as $i => $office)

                                    <div
                                        class="col-md-4 col-lg-4 col-sm-4 col-xs-4 {{($i == 3) ? 'thirdlocation' : '' }}{{($i == 4) ? 'fourthlocation' : '' }}">
                                        <div class="services-area-image">
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                        <div class="map-details">
                                            <a href="javascript:void(0)" tooltip="{{$office->address}}">
                                                <p>{{$office->name}}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="map-area relative">
                            <img src="{{ asset('storage/' . $map_image) }}">
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>
@endsection
