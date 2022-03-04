<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="{{ url('front/lang/ar') }}" class="ar active">عربي</a>
                    <a href="{{ url('front/lang/en') }}" class="en inactive">EN</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="{{ $settings->fb_url }}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings->insta_url }}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings->tw_url }}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{ 'https://wa.me/'.$settings->phone }}" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>{{ $settings->phone }}</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>{{ $settings->email }}</p>
                    </div>
                </div>


                @if(auth()->guard('client')->check())
                    <div class="member">
                        <p class="welcome">مرحباً بك</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->guard('client')->user()->name }}
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    الرئيسية
                                </a>
                                <a class="dropdown-item" href="{{ route('client-profile',auth()->guard('client')->user()->id) }}">
                                    <i class="far fa-user"></i>
                                    معلوماتى
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="far fa-bell"></i>
                                    اعدادات الاشعارات
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="far fa-heart"></i>
                                    المفضلة
                                </a>
                                <form method="GET" action="{{ url('front/client-logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ url('front/client-logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>تسجيل الخروج</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
