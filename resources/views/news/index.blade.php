@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
    </header>

    <section class="blog-area blog-page news-page section-padding gray-bg">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{ $banner->title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $n)
                    @if(mb_detect_encoding($n->short_description) =='ASCII')
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="shipping-service wow fadeIn">
                                <div class="blog-image newspageblog">
                                    <img src="{{ asset('storage/' . $n->image_path) }}" alt="{{ $n->title }}">
                                </div>
                                <div class="news-service-details">
                                    <h3><a>{{ $n->title }}</a></h3>
                                    <div class="blog-meta"><a>{{ $n->created_at->format('d F Y') }}</a></div>


                                    <p>
                                        {{ $n->short_description }}
                                    </p>


                                    <a href="{{ route('news.show', $n->slug) }}"
                                       class="flex flex-row items-center mt-3 more-news"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="shipping-service arabic wow fadeIn">
                                <div class="blog-image newspageblog">
                                    <img src="{{ asset('storage/' . $n->image_path) }}" alt="{{ $n->title }}">
                                </div>
                                <div class="news-service-details arabic">
                                    <h3><a>{{ $n->title }}</a></h3>
                                        <?php
                                        $months = array(
                                            '01' => 'يناير',
                                            '02' => 'فبراير',
                                            '03' => 'مارس',
                                            '04' => 'ابريل',
                                            '05' => 'مايو',
                                            '06' => 'يونيو',
                                            '07' => 'يوليو',
                                            '08' => 'اغسطس',
                                            '09' => 'سبتمبر',
                                            '10' => 'اكتوبر',
                                            '11' => 'نوفمبر',
                                            '12' => 'ديسمبر',
                                        )
                                        ?>


                                        <?php $month = date("m", strtotime($n->created_at)); ?>
                                    <div class="blog-meta arabic">
                                        <a>{{ date(' N', strtotime($n->created_at)) }} {{ $months[$month] }} {{ date('Y', strtotime($n->created_at)) }}</a>
                                    </div>
                                    <p></p>


                                    <p>
                                        {{ $n->short_description }}
                                    </p>


                                    <a href="{{ route('news.show', $n->slug) }}"
                                       class="flex flex-row items-center mt-3 more-news"> <span
                                            class="ml-2">المزيد</span> <i class="fa fa-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
    </section>

@endsection
