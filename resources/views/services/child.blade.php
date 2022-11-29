@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $service->page->banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>

    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{ $service->page->banner->title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 ">
                    @foreach($service->items as $i => $item)
                        <div class="tab-content sea-freight-content">
                            <div class="d-flex align-items-center" id="service-{{ $i }}">
                                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                                    <h3>{{ $item->title }}</h3>
                                    <div class="sea-freigt-details">
                                        <p> {!! html_entity_decode($item->description) !!} </p>
                                    </div>
                                </div>
                                @if($item->image_path)
                                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                        <div class="sea-freigt-details">
                                            <img src="{{ asset('storage/'. $item->image_path) }}"
                                                 alt="{{ $item->title }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
                        <div class="single-sidebar-widget widget_categories" id="new-sidebar">
                            <h4>Other {{ $service->name }} Services</h4>
                            <ul>
                                @foreach($service->parent->children as $child)
                                    @if($child->id != $service->id)
                                        <li>
                                            <a href="{{ route('services.show', $child->slug) }}">{{ $child->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
