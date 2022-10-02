@extends('layouts.main')
@section('content')

    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
        </div>
    </header>

    <div class="fullwidth">
        <div
            class="vc_row wpb_row vc_row-fluid foreground-color-45 about-block rtl-rotate-background vc_custom_1473757893014 vc_row-has-fill"
            style="background-image:url('{{asset('themes/theme_en/img/photo.jpg')}}');">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="container-fluid">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid rtl-rotate-background-return">
                                <div
                                    class="col-md-8 col-sm-12 pd-50-30 wpb_column vc_column_container vc_col-sm-8 vc_col-has-fill">
                                    <div class="vc_column-inner vc_custom_1473321151448">
                                        <div class="wpb_wrapper">
                                            @foreach($abouts as $i => $about)
                                                @if($i == 0)
                                                    @continue
                                                @endif
                                                <h2>{{ $about->title }}</h2>
                                                <p class="inner-p">{{ $about->description }}</p>
                                                @if (!$loop->last)
                                                    <hr>
                                                @endif
                                            @endforeach

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner vc_custom_1472523849454">
                                        <div class="wpb_wrapper">
                                            <div class="g5plus-heading heading-lg frame-35 heading-full text-left dark">
                                                <div class="text-heading">
                                                    <h2 class="heading-title fw-extra-bold"> {{ $abouts[0]->title }}</h2>
                                                    <div class="heading-frame frame-right"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="wpb_text_column wpb_content_element vc_custom_1472524013703 text-color-white">
                                                <div class="wpb_wrapper text-color-white">
                                                    <p>{{ $abouts[0]->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space"></div>
    @if($certificates->count())
        <section class="clients-area section-padding wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="about-content-area wow fadeIn">
                            <div class="clients-title">
                                <h2 class="">Membership & certifications</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="client-list">
                            @foreach($certificates as $certificate)
                                <div class="single-client">
                                    <a target="{{ $certificate->link ? '_blank' : '' }}"
                                       href="{{ $certificate->link ?? '#' }}">
                                        <img
                                            src="{{asset('storage/' . $certificate->image_path)}}"
                                            alt="{{ $certificate->name }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
