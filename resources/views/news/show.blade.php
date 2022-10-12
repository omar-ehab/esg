@extends('layouts.main')
@section('content')
    @if(mb_detect_encoding($news->short_description) =='ASCII')
        <section class="blog-area blog-page news-page section-padding">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $news->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                        <div class="sc-services-details wow fadeIn">


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <img src="{{asset('storage/' . $news->image_path)}}" alt="{{ $news->title }}">
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="blog-area blog-page news-page arabic-details section-padding">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $news->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="sc-services-details wow fadeIn">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <img src="{{asset('storage/' . $news->image_path)}}" alt="{{ $news->title }}">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
