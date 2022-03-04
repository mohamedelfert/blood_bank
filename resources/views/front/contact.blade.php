@extends('front.index')
@section('content')

    <div class="contact-us">
        <div class="contact-now">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                        </ol>
                    </nav>
                </div>
                <div class="row methods">
                    <div class="col-md-6">
                        <div class="call">
                            <div class="title">
                                <h4>اتصل بنا</h4>
                            </div>
                            <div class="content">
                                <div class="logo">
                                    <img src="{{ asset('design/front/imgs/logo.png') }}">
                                </div>
                                <div class="details" style="margin-bottom: 5px">
                                    <ul>
                                        <li><span>الجوال:</span> {{ $settings->phone }}</li>
                                        <li><span>فاكس:</span> 234234234</li>
                                        <li><span>البريد الإلكترونى:</span> {{ $settings->email }}</li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <h4 style="margin-bottom: 10px">تواصل معنا</h4>
                                    <div class="icons" dir="ltr">
                                        <div class="out-icon">
                                            <a href="{{ $settings->fb_url }}" target="_blank">
                                                <img src="{{ asset('design/front/imgs/001-facebook.svg') }}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{ $settings->tw_url }}" target="_blank">
                                                <img src="{{ asset('design/front/imgs/002-twitter.svg') }}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{ $settings->youtube_url }}" target="_blank">
                                                <img src="{{ asset('design/front/imgs/003-youtube.svg') }}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{ $settings->insta_url }}" target="_blank">
                                                <img src="{{ asset('design/front/imgs/004-instagram.svg') }}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{ 'https://wa.me/'.$settings->phone }}" target="_blank">
                                                <img src="{{ asset('design/front/imgs/005-whatsapp.svg') }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div class="title">
                                <h4>تواصل معنا</h4>
                            </div>
                            <div class="fields">
                                <form method="POST" action="{{ route('add-contact') }}">
                                    @csrf

                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}" aria-describedby="emailHelp"
                                           placeholder="الإسم" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" id="exampleFormControlInput1"
                                           placeholder="البريد الإلكترونى" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" id="exampleFormControlInput1"
                                           placeholder="الجوال" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                           name="subject" value="{{ old('subject') }}" id="exampleFormControlInput1"
                                           placeholder="عنوان الرسالة" autofocus>
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <textarea placeholder="نص الرسالة"
                                              class="form-control @error('message') is-invalid @enderror" name="message"
                                              id="exampleFormControlTextarea1" rows="3"
                                              autofocus>{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <button type="submit">إرسال</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
