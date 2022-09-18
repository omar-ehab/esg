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
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success" style="text-align: center">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="wrapper">
                    <div class="inner">
                        <form action="{{ route('career.save') }}" method="POST" enctype="multipart/form-data"
                              class="form-career-new" id="career">
                            @csrf
                            <h3 class="title-career">Apply now to find the job that fits your skills !</h3>
                            <div class="form-row">
                                <input type="text" name="first_name" id="form-name-first" class="form-control"
                                       placeholder="First Name*" value="{{old('first_name')}}" required>
                            </div>
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-row">
                                <input type="text" name="last_name" id="form-name-last" class="form-control"
                                       placeholder="Last Name*" value="{{old('last_name')}}" required>
                            </div>
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-row">
                                <input id='career_phone' type="text" name="phone" class="form-control"
                                       placeholder="Phone*" value="{{old('phone')}}" required>

                                <p id='phoneError' class="text-danger"
                                   style="margin: 49px 0 0px 2px;position: absolute;display:none" data-content="">Please
                                    Enter Valid Number</p>
                            </div>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-row ">
                                <input maxlength="14" type="number" name="national_id" class="form-control mb-0"
                                       placeholder="National ID*" value="{{old('national_id')}}"
                                       id='national_id' required>

                            </div>
                            @error('national_id')
                            <span class="text-danger d-block">{{ $message }}</span>
                            @enderror

                            <div class="form-row">
                                <div class="form-holder">
                                    <select name="job_id" id="" class="form-control" required="required">
                                        <option value="" disabled selected>Job applied for..*</option>
                                        @foreach($jobs as $job)
                                            <option
                                                value="{{$job->id}}" {{(old('job_id') == $job->id) ? 'selected' : '' }}>{{$job->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('job_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-input form-cv">
                                    <div class="file-upload-wrapper" data-text="Select your file!*">
                                        <input name="cv" type="file" class="file-upload-field"
                                               accept=
                                                   "application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newsletter" data-content="">*Accepted File Formats for Uploads ( doc , docx
                                    , pdf) & Max File Size is 5 MB </label>
                            </div>
                            @error('cv')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-row">
                                @if(config('services.recaptcha.key'))
                                    <div class="g-recaptcha"
                                         data-sitekey="{{config('services.recaptcha.key')}}">
                                    </div>
                                    @error('g-recaptcha-response')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>


                            <button type="submit">Submit Now
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
