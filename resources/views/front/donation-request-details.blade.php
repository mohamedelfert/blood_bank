@extends('front.index')
@section('content')

    <div class="inside-request">
        <div class="ask-donation">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('donation-requests') }}">طلبات التبرع</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلب
                                التبرع: {{ $donation_request->patient_name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="details">
                    <div class="person">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>الإسم</p>
                                        </div>
                                        <div class="light">
                                            <p> {{ $donation_request->patient_name }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>فصيلة الدم</p>
                                        </div>
                                        <div class="light">
                                            <p dir="ltr"> {{ optional($donation_request->bloodType)->name }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>العمر</p>
                                        </div>
                                        <div class="light">
                                            <p> {{ $donation_request->patient_age }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>عدد الأكياس المطلوبة</p>
                                        </div>
                                        <div class="light">
                                            <p> {{ $donation_request->bags_num }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>المشفى</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation_request->hospital_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>رقم الجوال</p>
                                        </div>
                                        <div class="light">
                                            <p> {{ $donation_request->patient_phone }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="inside">
                                    <div class="info">
                                        <div class="special-dark dark">
                                            <p>عنوان المشفى</p>
                                        </div>
                                        <div class="special-light light">
                                            <p> {{ $donation_request->hospital_address }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details-button">
                            <a>التفاصيل</a>
                        </div>
                    </div>
                    <div class="text">
                        <p> {{ !empty($donation_request->details) ? $donation_request->details : 'لا يوجد تفاصيل متاحه' }} </p>
                    </div>
                    <div class="location">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d444.13152614425417!2d{{$donation_request->longitude}}!3d{{$donation_request->latitude}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1646398326086!5m2!1sar!2seg"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
