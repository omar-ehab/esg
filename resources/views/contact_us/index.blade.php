@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
        </div>
        </div>
    </header>
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="contact-form">
                            @if(session()->has('message'))
                                <div class="alert alert-success" style="text-align: center">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{ route('contact-us.save') }}" id="contact-form" method="post">
                                @csrf
                                <h4>Please fill in this information, and we will get back to you asap.</h4>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group" id="name-field">
                                            <div class="form-input">
                                                <input type="text" class="form-control" id="form-name-first"
                                                       name="first_name" placeholder="First Name*"
                                                       onkeyup="validateName()"
                                                       value="{{ old('first_name') }}" required>
                                            </div>
                                        </div>
                                        @error('first_name')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group" id="name-field">
                                            <div class="form-input">
                                                <input type="text" class="form-control" id="form-name-last"
                                                       name="last_name" onkeyup="validateName()"
                                                       placeholder="Last Name*"
                                                       value="{{ old('last_name') }}" required>
                                            </div>
                                        </div>
                                        @error('last_name')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group" id="phone-field">
                                            <div class="form-input">
                                                <input class="form-control" id="phone" name="phone"
                                                       placeholder=" Phone Number*" type="tel"
                                                       value="{{ old('phone') }}"
                                                       onkeyup="validatePhone()" required>
                                            </div>
                                        </div>
                                        @error('phone')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group" id="email-field">
                                            <div class="form-input">
                                                <input type="email" class="form-control" id="form-email"
                                                       name="email" placeholder="Email*"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        @error('email')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group" id="company-field">
                                            <div class="form-input">
                                                <input type="text" class="form-control" id="form-company"
                                                       name="company" placeholder="Company*"
                                                       value="{{ old('company') }}" required>
                                            </div>
                                        </div>
                                        @error('company')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-holder">
                                            <select name="country_id" id="" class="form-control" required>
                                                <option value="" disabled selected>Please Select Your Country*</option>
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{$country->id}}" {{(old('country_id') == $country->id) ? 'selected' : '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                        @error('country_id')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group" id="message-field">
                                            <div class="form-input">
                                                <textarea class="form-control" rows="4" id="form-message"
                                                          name="message"
                                                          placeholder="How Can we Support You?*"
                                                          required>{{ old('message') }}</textarea>
                                            </div>
                                        </div>
                                        @error('message')
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <input type="checkbox" id="newsletter" name="newsletter"
                                               value="1" {{(old('newsletter') == 1) ? 'checked' : '' }}>
                                        <label for="newsletter" data-content="">Yes, I would like to receive the latest
                                            updates from EgyMar. I
                                            can unsubscribe at any time. </label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        @if(config('services.recaptcha.key'))
                                            <div class="g-recaptcha"
                                                 data-sitekey="{{config('services.recaptcha.key')}}">
                                            </div>
                                            @error('g-recaptcha-response')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 5px">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group">

                                            <button type="submit">Submit Now
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 contactinfo">
                        <div class="contact-image">
                            <div class="contact-address">
                                <h4>Contact Info</h4>
                                <address>
                                    <i class="fas fa-map-marker-alt"></i> {{ $address }}
                                </address>
                                <p>
                                    <i class="fas fa-mobile-alt"></i>
                                    <a href="callto:{{ $phone }}">{{ $phone }}</a>
                                </p>
                                <p>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                                </p>

                            </div>
                            <div class="social-bookmark">
                                <h4>Follow Us </h4>
                                <ul>
                                    @if(strlen($facebook) > 0)
                                        <li>
                                            <a href="{{ $facebook }}" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(strlen($linkedin) > 0)
                                        <li>
                                            <a href="{{ $linkedin }}" target="_blank">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(strlen($instagram) > 0)
                                        <li>
                                            <a href="{{ $instagram }}" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(strlen($youtube) > 0)
                                        <li>
                                            <a href="{{ $youtube }}" target="_blank">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CONTACT US AREA END-->
    <script>

        function validatePhone() {
            var mobNum = $('#phone').val();
            var filter = /^[0-9\+\-][0-9]*$/;

            if (filter.test(mobNum)) {
//            $("#phoneError").css("display", "none");


            } else {
                var phonenum = mobNum.slice(0, -1);
                $('#phone').val(phonenum);

//                $("#phoneError").css("display", "block");

//              return false;
            }

        }

        function validateName() {
            var name1 = $('#form-name-first').val();
            var name2 = $('#form-name-last').val();

            var filter = /^[A-Za-z]+$/;

            if (filter.test(name1)) {


            } else {
                var firstName = name1.slice(0, -1);
                $('#form-name-first').val(firstName);
            }
            if (filter.test(name2)) {


            } else {
                var lastName = name2.slice(0, -1);
                $('#form-name-last').val(lastName);
            }

        }
    </script>
@endsection
