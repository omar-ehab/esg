@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>
    <section class="blog-area blog-page linksnew section-padding gray-bg">
        <div class="container">

            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text-law text-center">
                        <h2>Maritime Law</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($laws as $law)
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="client-promo useful-links-law">
                            <a href="{{ asset('storage/' . $law->pdf_path) }}" download="{{ $law->title }}">

                                <a href="{{ asset('storage/' . $law->pdf_path) }}" download="{{ $law->title }}">

                                <span>
                                    {{ $law->title }} <i class="fas fa-download"></i>
                                </span>
                                    <span>
                                    <i class="far fa-file-pdf" aria-hidden="true"></i>
                                </span>
                                </a>


                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
