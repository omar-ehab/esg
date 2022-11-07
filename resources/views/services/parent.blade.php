@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $service->page->banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>
    <section class="main-industries">
        <div class="container mb-5">
            <div class="text-left industries-section mt-5">
                <h1>{{ $service->name }}</h1>
                <p> {!! html_entity_decode( $service->description) !!} </p>

            </div>
            <div class="row">
                @foreach($service->children as $child)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a href="{{ route('services.show', $child->slug) }}">
                            <div class="box-industries">
                                <div class="our-services-industries">
                                    <div class="icon">

                                        <img src="{{ asset('storage/' . $child->card_image_path) }}"
                                             alt="{{ $child->name }}">
                                    </div>
                                    <div class="text">
                                        <h4>{{ $child->name }}</h4>

                                        <p>{!! \Illuminate\Support\Str::limit($child->description, 100) !!}</p>


                                        <a href="{{ route('services.show', $child->slug) }}"
                                           class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                                class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
