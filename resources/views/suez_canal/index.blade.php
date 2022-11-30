@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>
    <section class="main-industries">
        <div class="container mb-5">
            <div class="text-left industries-section mt-5">
                <h1>SUEZ CANAL</h1>
                <p></p>
                <p>Our Suez Canal transit services assure a safe and smooth Suez Canal passage. With us, you can combine
                    our Suez Canal transit service with a range of integrated services including ship agency, husbandry,
                    bunker fuel supplies, ship spares logistics. We are a licensed Suez Canal Transit Operator for all
                    size vessels serving more than 500 vessels yearly of container, conventional, ro-ro, reefer and
                    military vessels. EgyMar is the exclusive ship agent for ZIM Integrated Shipping Services for Suez
                    Canal transit.</p>
                <p></p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('services.suez-canal.about') }}"></a>
                    <div class="box-industries">
                        <a href="{{ route('services.suez-canal.about') }}"></a>
                        <div class="our-services-industries">
                            <a href="{{ route('services.suez-canal.about') }}">
                                <div class="icon">
                                    <img src="{{ asset('assets/themes/theme_en/img/service/sc/about.jpg') }}">
                                </div>
                            </a>
                            <div class="text">
                                <a href="{{ route('services.suez-canal.about') }}">
                                    <h4>About Suez Canal</h4>
                                    <p> By maintaining close relations with the Suez Canal Authority,EgyMar provides a
                                        range of canal transit...</p>
                                </a>
                                <a href="{{ route('services.suez-canal.about') }}"
                                   class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800">
                                    <span class="ml-2">Learn more</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('services.suez-canal.convoy') }}"></a>
                    <div class="box-industries">
                        <a href="{{ route('services.suez-canal.convoy') }}"></a>
                        <div class="our-services-industries">
                            <a href="{{ route('services.suez-canal.convoy') }}">
                                <div class="icon">
                                    <img src="{{ asset('assets/themes/theme_en/img/service/sc/convoy.jpg') }}">
                                </div>
                            </a>
                            <div class="text">
                                <a href="{{ route('services.suez-canal.convoy') }}">
                                    <h4>Suez Canal Convoy</h4>
                                    <p> By maintaining close relations with the Suez Canal Authority,EgyMar provides a
                                        range of canal transit...</p>
                                </a>
                                <a href="{{ route('services.suez-canal.convoy') }}"
                                   class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800">
                                    <span class="ml-2">Learn more</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('services.suez-canal.calculator') }}"></a>
                    <div class="box-industries">
                        <a href="{{ route('services.suez-canal.calculator') }}"></a>
                        <div class="our-services-industries">
                            <a href="{{ route('services.suez-canal.calculator') }}">
                                <div class="icon">
                                    <img src="{{ asset('assets/themes/theme_en/img/service/sc/calculator.jpg') }}">
                                </div>
                            </a>
                            <div class="text"><a href="{{ route('services.suez-canal.calculator') }}">
                                    <h4>Suez Canal Toll Calculator</h4>
                                    <p> We provide tailored and efficient solutions for shipping your Out of Gauge, In
                                        Gauge and...</p>
                                </a>
                                <a href="{{ route('services.suez-canal.calculator') }}"
                                   class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800">
                                    <span class="ml-2">Learn more</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>
@endsection
