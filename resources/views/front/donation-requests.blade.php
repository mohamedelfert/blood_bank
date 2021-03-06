@extends('front.index')
@section('content')

    <div class="donation-requests">
        <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                        </ol>
                    </nav>
                </div>

                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>طلبات التبرع</h2>
                    </div>
                    <div class="content">
                        <form action="{{ route('donations-filter') }}" method="POST" class="row filter">
                            @csrf
                            <div class="col-md-5 blood">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select class="form-control" id="exampleFormControlSelect1" name="blood_type_id">
                                            <option selected disabled>اختر فصيلة الدم</option>
                                            @foreach($blood_types as $blood_type)
                                                <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 city">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select class="form-control" id="exampleFormControlSelect1" name="city_id">
                                            <option selected disabled>اختر المدينة</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="patients">
                            @foreach($donation_requests as $donation)
                                <div class="details">
                                    <div class="blood-type">
                                        <h2 dir="ltr">{{ optional($donation->bloodType)->name }}</h2>
                                    </div>
                                    <ul>
                                        <li><span>اسم الحالة:</span> {{ $donation->patient_name }} </li>
                                        <li><span>مستشفى:</span> {{ $donation->hospital_name }} </li>
                                        <li><span>المدينة:</span> {{ optional($donation->city)->name }} </li>
                                    </ul>
                                    <a href="{{ route('donation-details',$donation->id) }}">التفاصيل</a>
                                </div>
                            @endforeach
                        </div>

                        <div style="margin: 5px 50%">
                            {!! $donation_requests->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
