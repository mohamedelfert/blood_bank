@extends('front.index')
@section('content')

    <div class="who-are-us">
        <div class="about-us">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                        </ol>
                    </nav>
                </div>
                <div class="details">
                    <div class="logo">
                        <img src="{{ asset('design/front/imgs/logo.png') }}">
                    </div>
                    <div class="text">
                        <p> {{ $settings->about_app }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
