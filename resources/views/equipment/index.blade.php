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
                        <h2>Equipment</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($equipment as $eq)
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="sea-freight-content"
                             style="display: flex;flex-direction: column;justify-content: center;align-items: center">
                            <h3>{{ $eq->name }}</h3>
                            <img src="{{ asset('storage/' . $eq->image_path) }}" alt="{{ $eq->name }}" class="my-3"/>
                            <table border="1" class="table-striped table"
                                   style="width: 75%; margin-top: 16px; font-size: 16px">
                                <tbody>
                                @foreach($eq->details as $item)
                                    <tr style="border: 1px solid black">
                                        <td style="border: 1px solid black; font-weight: 900">{{ $item->key }}</td>
                                        <td style="border: 1px solid black">{{ $item->first_value }}</td>
                                        <td style="border: 1px solid black">{{ $item->second_value }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
