<footer id="footer">
    <div class="footer-area dark-bg">
        <div class="footer-area-bg"></div>

        <div class="footer-bottom-area wow fadeIn">
            <div class="container">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">

                    <div class="subscribe-content">
                        <h2>Newsletter</h2>

                    </div>
                    <div class="subscriber-form-area">
                        <form action="{{ route('newsletter.save') }}" class="subsriber-form" method="post" id='target'>
                            @csrf
                            <input type="subscriber-email" name="email" id="subscriber-mail" value="{{ old('email') }}"
                                   placeholder="Enter Your Mail" required>

                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    @if(Session::has('messageNewsLetter'))
                        <p style="color: #00aeef; font-weight: 600;font-size: 16px;">{{ Session::get('messageNewsletter') }}</p>
                    @endif
                    @error('email')
                    <p style="color: #f34051; font-weight: 600;font-size: 16px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="footer-social-bookmark right-footer wow fadeIn">
                        <h2>Connect with Us</h2>


                        <ul class="social-bookmark">
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


                <div class="col-md-12">
                    <div class="footer-border"></div>
                </div>
            </div>
        </div>

        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bordercopyright">
                        <div class="footer-copyright text-center">
                            <p>Copyright &copy;
                                {{ now()->format('Y') }}
                                All rights reserved | developed by
                                <a href="https://omarehab.net/" target="_blank"> Omar Ehab </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="lawmsg" class="alert alert-info alert-dismissible h5 show fixed-bottom d-none" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    We use cookies to improve user experience. Please accept cookies for optimal performance.
    <div class="accept-cookie-btn">
        <a href="">
            <button class="" title="Accept Cookies" aria-label="Accept Cookies" onclick="" tabindex="3"><i
                    class="fas fa-check"></i>Accept Cookies
            </button>
        </a>
    </div>
</div>
@push('scripts')
    <script>
        function getCookie(name) {
            const cookies = document.cookie;
            const prefix = name + "=";
            let begin, end;
            begin = cookies.indexOf("; " + prefix);
            if (begin === -1) {
                begin = cookies.indexOf(prefix);
                if (begin !== 0) return null;
            } else {
                begin += 2;
                end = document.cookie.indexOf(";", begin);
                if (end === -1) {
                    end = cookies.length;
                }
            }
            // because unescape has been deprecated, replaced with decodeURI
            //return unescape(dc.substring(begin + prefix.length, end));
            return decodeURI(cookies.substring(begin + prefix.length, end));
        }

        const cookies_terms = getCookie('cookies-terms');
        if (!cookies_terms) {
            document.getElementById('lawmsg').remove()
        }
    </script>
@endpush

