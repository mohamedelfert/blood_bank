<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('design/front/imgs/logo.png') }}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-app') }}">عن بنك الدم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts') }}">المقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donation-requests') }}">طلبات التبرع</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">اتصل بنا</a>
                    </li>
                </ul>

                <!--not a member-->
                <div class="accounts">
                    <a href="{{ route('signup') }}" class="create">إنشاء حساب جديد</a>
                    <a href="{{ route('signin') }}" class="signin">الدخول</a>
                </div>



{{--                <a href="#" class="donate">--}}
{{--                    <img src="{{ asset('design/front/imgs/transfusion.svg') }}">--}}
{{--                    <p>طلب تبرع</p>--}}
{{--                </a>--}}



            </div>
        </div>
    </nav>
</div>
