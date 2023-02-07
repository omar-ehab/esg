@extends('layouts.main')
@section('content')

    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;background-size: cover;">
            <div class="area-bg"></div>
            <div class="container">
            </div>
        </div>
    </header>

    <section class="search-area">
        <div class="section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="inner-search">

                    <p class="count-found">{{ $count }} Search Result Found</p>

                    @if(count($about))
                        @foreach($about as $obj)
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->title}}</h3>
                                <p> {!! html_entity_decode($obj->description ) !!}</p>
                                <span class="highlighted"><a href="{{ route('about-us') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif

                    @if(count($news))
                        <div class="search-result">
                            <h3 class="title-search">News</h3>
                        </div>
                        <td style="width: 30%;word-break: break-all;" class='hidden-480'>
                            @foreach($news as $new)
                                {{ $new->short_description }}
                                <span class="highlighted">
                                    <a href="{{ route('news.show', $new->slug) }}">read more</a>
                                </span>
                            @endforeach
                        </td>
                    @endif

                    @if(count($services))
                        <div class="search-result">
                            <h3 class="title-search">Services</h3>
                        </div>
                        @foreach($services as $obj)
                            <div class="search-result">
                                <h5>{{ $obj->name}}</h5>
                                <p>{!! html_entity_decode($obj->description ) !!}</p>
                                <span class="highlighted">
                                    <a href="{{ route('services.show', $obj->slug) }}">read more</a>
                                </span>
                            </div>
                        @endforeach
                    @endif

                    @if(count($scopeOfActivities))
                        <div class="search-result">
                            <h3 class="title-search">Scope Of Activities</h3>
                        </div>
                        @foreach($scopeOfActivities as $obj)
                            <div class="search-result">
                                <h5>{{ $obj->name}}</h5>
                                <p>{!! html_entity_decode($obj->description ) !!}</p>
                                <span class="highlighted">
                                    <a href="{{ route('scope-of-activities.show', $obj->slug) }}">read more</a>
                                </span>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!--search area  END-->

@endsection
