@extends('layouts.main')
@section('content')
    @section('page_title')
        {{$title}}
    @endsection
    <style>
        .required {
            color: red;

        }
    </style>
    <aside id="colorlib-hero" style="height: 500px;">
        <div class="flexslider">
            <ul class="slides heightmobile" style="height: 500px;">
                <li style="background-image: url({{asset('/bannerImages')}}/{{ $banner->banner_image }})">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text"
                                 style="right: -38%; text-align: center;">
                                <div class="slider-text-inner" id="guide-slide-text">
                                    <h1 id="dalel">{{ $banner->banner_title }} </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>





    <form enctype="multipart/form-data" class="formcontact" action="{{route('membership')}}" method="post">

        <div class="container">
            <div class="col-md-12 text-center animate-box">
                <h3 class="guidetitle">استمارة طلب عضوية </h3>
                @csrf

                <!--        <form action="#">-->

                <!--        </form>-->
            </div>
            <!--</div>-->


            <div id="colorlib-services">
                <div class="container" id="memberapplicationcontainer">


                    <div class="row">
                        @if($membershipDetails)
                            <div class="alert alert-success" id="confirm">
                                <h3 class="titlecontact" id="subtitle4"> شكرا لاشتراكك معنا </h3>
                            </div>
                        @else
                        @endif


                    </div>

                    <div class="row">

                        <div class="center">
                            <p class="radiobtn">
                                <label>
                                    <input class="option-input radio" id="personCheck" type="radio" name="member_type"
                                           value="شخصية" data-skin="minimal" onclick="yesnoCheck();">
                                    <span>فردية</span>
                                </label>
                            </p>

                            <p class="radiobtn">
                                <label>
                                    <input class="option-input radio" id="familyCheck" type="radio" name="member_type"
                                           value="عائلية" data-skin="minimal" onclick="yesnoCheck();">
                                    <span>عائلية</span>
                                </label>
                            </p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <h2 class="titlecontact"><i class="fas fa-user"></i> البيانات الاساسية</h2>
                            <input type="text" name="membership_type_id" value="1" hidden="hidden">

                            <!--        <form action="#">-->

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="name">الاسم <span class="required">*</span> </label>
                                    <input type="text" id="name" class="form-control member2 "
                                           placeholder=" اكتب الاسم " name="membership_name" required="required"
                                           onkeyup="memberType()">
                                </div>

                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="birthday"> تاريخ الميلاد<span class="required">*</span></label>
                                    <!--                            <input type="number" id="birthday" class="form-control member2 " placeholder="  تاريخ الميلاد">-->
                                    <br>
                                    <select name=day required="required" class="dateform">
                                        <option value="">اختر اليوم</option>

                                        @foreach($days as $day)
                                            <option value='{{$day}}'>{{$day}}</option>

                                        @endforeach
                                    </select>
                                    <select name=month required="required" class="dateform">
                                        <option value="">اختر الشهر</option>
                                        @foreach($months as $i =>$month)
                                            <option value='{{$i}}'>{{$month}}</option>

                                        @endforeach
                                    </select>
                                    <select name=year required="required" class="dateform">
                                        <option value="">اختر السنة</option>
                                        @foreach($years as $i =>$year)
                                            <option value='{{$year}}'>{{$year}}</option>

                                        @endforeach
                                    </select>


                                </div>
                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="place">محل الاقامة <span class="required">*</span></label>
                                    <input type="text" id="place" class="form-control member2 "
                                           placeholder=" محل الميلاد  " name="address" required="required">
                                </div>

                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="nationalid">الرقم القومى<span class="required">*</span></label>
                                    <input type="number" id="nationalid" class="form-control member2 "
                                           placeholder=" الرقم القومى " name="NID" required="required">
                                </div>

                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="nationalid">صورة الرقم القومى</label>
                                    <input type="file" name="NID_image"/>
                                </div>
                            </div>


                            <!--                </form>-->

                        </div>

                    </div>

                    <!---------------------->

                    <div class="row">
                        <div class="col-md-6 animate-box">
                            <h2 class="titlecontact"><i class="fas fa-briefcase"></i> بيانات العمل </h2>
                            <!--                <form action="#" class="formcontact">-->

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="job">الوظيفة <span class="required">*</span></label>
                                    <input type="text" id="job" class="form-control member2"
                                           placeholder=" اكتب الوظيفة " name="work" required="required">
                                </div>

                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="jobname"> اسم الشركة<span class="required">*</span></label>
                                    <input type="text" id="jobname" class="form-control member2"
                                           placeholder=" اسم الشركة" name="company" required="required">
                                </div>
                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="placejob">مكان العمل<span class="required">*</span></label>
                                    <input type="text" id="placejob" class="form-control member2"
                                           placeholder=" مكان العمل " name="work_address" required="required">
                                </div>
                            </div>


                            <!--                </form>-->

                        </div>

                        <div class="col-md-6 animate-box">
                            <h2 class="titlecontact"><i class="fas fa-paper-plane"></i> وسيلة الاتصال </h2>
                            <!--                <form action="#" class="formcontact">-->

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="mobile">الموبايل<span class="required">*</span></label>
                                    <input type="number" id="mobile" class="form-control member2"
                                           placeholder=" اكتب رقم الموبايل " name="mobile" required="required">
                                </div>

                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="homenumber"> تيلفون المنزل<span class="required">*</span></label>
                                    <input type="number" id="homenumber" class="form-control member2"
                                           placeholder="  رقم التليفون" name="telephone" required="required">
                                </div>
                            </div>

                            <div class="row form-group member">
                                <div class="col-md-12">
                                    <label for="email">البريد الالكتروني<span class="required">*</span></label>
                                    <input type="text" id="email" class="form-control member2"
                                           placeholder="البريد الالكتروني" name="email" required="required">
                                </div>
                            </div>


                            <!--                </form>-->

                        </div>


                    </div>
                </div>

                <br>
                <!------------------>

                <div class="col-md-12 text-center animate-box" id="family" style="display: none">
                    <h3 class="guidetitle">بيانات من يعولهم العضوية </h3>
                    <h6 class="smalltitle">(يملأ للعضويات العائلية فقط)</h6>


                    <div class="container" id="memberapplicationcontainer2" id="family2">


                        <div class="row" id="family22">
                            <div class="col-md-12 animate-box" style="opacity: 1;">

                                <!--                    <form action="#" class="formcontact">-->

                                <div class="columnmember">
                                    <div class="row form-group member">
                                        <div class="col-md-12">
                                            <label for="name">الاسم <span class="required">*</span></label>
                                            <input type="text" id="name" class="form-control member2 " placeholder="  "
                                                   name="membership_family_name[0]">
                                        </div>

                                    </div>

                                </div>


                                <div class="columnmember2">
                                    <div class="row form-group member">
                                        <div class="col-md-12">
                                            <label for="age">السن <span class="required">*</span></label>
                                            <input type="text" id="age" class="form-control member2 " placeholder="  "
                                                   name="membership_family_age[0]">
                                        </div>

                                    </div>

                                </div>

                                <div class="columnmember">
                                    <div class="row form-group member">
                                        <div class="col-md-12">
                                            <label for="nationalid">الرقم القومى<span class="required">*</span> </label>
                                            <input type="text" id="nationalid" class="form-control member2 "
                                                   placeholder="  " name="membership_family_NID[0]">
                                        </div>

                                    </div>

                                </div>
                                <div class="columnmember">
                                    <div class="row form-group member">
                                        <div class="col-md-12">
                                            <label for="nationalidimage" id="newleft">صورة الرقم القومى</label>
                                            <input class="newtop" type="file" name="NID_image_family[0]"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="columnmember imgid">
                                    <div class="row form-group member">
                                        <div class="col-md-12">
                                            <label for="relation">صلة القرابة<span class="required">*</span> </label>
                                            <input type="text" id="relation" class="form-control member2 "
                                                   placeholder="  " name="membership_family_relationship[0]">
                                        </div>

                                    </div>

                                </div>


                                <div class="columnmember2">
                                    <div class="row form-group member">
                                        <a type="button" class="btn btn-primary btn-lg btn-learn memberbtn add">+</a>

                                        <!--                                      <a type="button" class="btn btn-primary btn-lg btn-learn memberbtn add" >-</a>-->

                                    </div>

                                </div>


                                <!--                    </form>-->

                            </div>
                        </div>

                        <hr>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 text-center animate-box">
                        <input type="submit" value="ارسال" class="btn btn-primary btnmember">
                    </div>
                </div>

            </div>
        </div>
    </form>

    <script type="text/javascript">
        function memberType() {
            var family = document.getElementById('familyCheck');
            var person = document.getElementById('personCheck');

            if (family.checked || person.checked) {
            } else {
                alert('اختر نوع العضوية فردية او عائلية')
            }
        }


        function yesnoCheck() {
            if (document.getElementById('familyCheck').checked) {
                document.getElementById('family').style.display = 'block';

            } else {
                document.getElementById('family').style.display = 'none';

            }

        }

        var j = 1;

        window.onload = function () {

            $('.add').click(function () {
                addRow();
            });


        }

        function addRow() {
            var i = j++;

            var tr =
                '<div class="col-md-12 animate-box" style="opacity: 1;">' +
                '<div class="columnmember"><div class="row form-group member"><div class="col-md-12"><input type="text" class="form-control member2 " placeholder="  " name="membership_family_name[' + i + ']" /></div></div></div>' +
                '<div class="columnmember2"><div class="row form-group member"><div class="col-md-12"><input type="text" class="form-control member2 " placeholder="  " name="membership_family_age[' + i + ']" /></div></div></div>' +
                '<div class="columnmember "><div class="row form-group member"><div class="col-md-12"><input type="text" class="form-control member2 " placeholder="  " name="membership_family_NID[' + i + ']" /></div></div></div>' +
                '<div class="columnmember "><div class="row form-group member"><div class="col-md-12"><input class="newtop" type="file" name="NID_image_family[' + i + ']" /></div></div></div>' +

                '<div class="columnmember imgid"><div class="row form-group member"><div class="col-md-12"><input type="text"  class="form-control member2 " placeholder="  " name="membership_family_relationship[' + i + ']" /></div></div></div>' +
                '<div class="columnmember2"> <div class="row form-group member topbtns remove"><a onclick="addRow()" type="button" class="btn btn-primary btn-lg btn-learn memberbtn add">+</a><a onclick="removeItem(this)" type="button" class="btn btn-primary btn-lg btn-learn memberbtn" style="background-color: #dc2828;border: 2px solid #881717;">x</a></div></div>' +
                '</div>';
            $('#family22').append(tr);
        }

        function removeItem(e) {
            if (confirm("هل أنت متأكد؟")) {

                $(e).parent().parent().parent().remove();

            }

        }
    </script>

@endsection
