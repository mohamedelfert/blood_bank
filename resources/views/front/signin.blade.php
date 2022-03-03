@extends('front.index')
@section('content')

    <div class="signin-account">
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                        </ol>
                    </nav>
                </div>
                <div class="signin-form">
                    <form action="" method="post">
                        <div class="logo">
                            <img src="{{ asset('design/front/imgs/logo.png') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                        </div>
                        <div class="row options">
                            <div class="col-md-6 remember">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                                </div>
                            </div>
                            <div class="col-md-6 forgot">
                                <img src="{{ asset('design/front/imgs/complain.png') }}">
                                <a href="#">هل نسيت كلمة المرور</a>
                            </div>
                        </div>
                        <div class="row buttons">
                            <div class="col-md-6 right">
                                <a href="#">دخول</a>
                            </div>
                            <div class="col-md-6 left">
                                <a href="{{ route('signup') }}">انشاء حساب جديد</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
