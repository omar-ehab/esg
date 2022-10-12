@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding ">
            <div class="container">

                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="accordion-port">
                            @foreach($ports as $i => $port)
                                <div>
                                    <input class="ac-input" id="ac-{{ $i }}" name="accordion-1"
                                           type="checkbox" {{( $i == 0) ? 'checked' : '' }} />
                                    <label class="ac-label" for="ac-{{ $i }}">{{ $port->name }}<i></i></label>
                                    <div class="article ac-content">
                                        @if($port->lat)
                                            {{ $port->lat }}
                                        @endif
                                        @if($port->lng)
                                            <div class="port"><span>Longitude:</span> {{ $port->lng }} </div>
                                        @endif

                                        @foreach($port->details as $detail)
                                            <h4>{{ $detail->name }}</h4>
                                            {!! $detail->description !!}
                                            @if(!$loop->last)
                                                <hr class="border-ports">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        figure.table {
            margin: auto;
        }

        figure.table table {
            width: 100% !important;
        }
    </style>
@endpush
