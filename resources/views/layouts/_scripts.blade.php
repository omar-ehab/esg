<script src="{{asset('assets/themes/theme_en/js/vendor/jquery-1.12.4.min.js')}}"></script>

<script>
    var video = document.getElementById("myVideo");
    var btn = document.getElementById("myBtn");

    function myFunction() {
        if (video.paused) {
            video.play();
            btn.innerHTML = ['<i class="far fa-play-circle"></i>'];
        } else {
            video.pause();
            btn.innerHTML = ['<i class="far fa-pause-circle"></i>'];
        }
    }

</script>

<script src="{{asset('assets/themes/theme_en/js/vendor/bootstrap.min.js')}}"></script>

<!--====== PLUGINS JS ======-->
<script src="{{asset('assets/themes/theme_en/js/vendor/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/vendor/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/vendor/jquery.appear.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/stellar.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/wow.min.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/stellarnav.min.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/contact-form.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/themes/theme_en/js/vendor/select2.min.css')}}"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{asset('assets/themes/theme_en/js/jquery.fancybox.min.js')}}"></script>

<!--===== ACTIVE JS=====-->
<script src="{{asset('assets/themes/theme_en/js/main.js')}}"></script>


<script src="{{asset('assets/themes/theme_en/build/js/intlTelInput.js')}}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "{{asset('assets/themes/theme_en/build/js/utils.js')}}",
    });
</script>
@stack('scripts')
