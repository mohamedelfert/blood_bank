@extends('front.index')
@section('content')

    <div class="create">
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('donation-requests') }}">طلبات التبرع</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إضافة طلب تبرع</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">
                    <form method="POST" action="{{ route('add-donation-request') }}">
                        @csrf
                        <input type="text" class="form-control @error('patient_name') is-invalid @enderror"
                               id="patient_name" name="patient_name" value="{{ old('patient_name') }}"
                               aria-describedby="emailHelp" placeholder="اسم المريض" autofocus>
                        @error('patient_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('patient_phone') is-invalid @enderror"
                               id="patient_phone" name="patient_phone" value="{{ old('patient_phone') }}"
                               aria-describedby="emailHelp" placeholder="رقم الهاتف" autofocus>
                        @error('patient_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="number" class="form-control @error('patient_age') is-invalid @enderror"
                               id="patient_age" name="patient_age" value="{{ old('patient_age') }}" min="1" max="120"
                               aria-describedby="emailHelp" placeholder="عمر المريض" autofocus>
                        @error('patient_age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <select class="form-control @error('blood_type_id') is-invalid @enderror" id="blood_type_id"
                                name="blood_type_id" autofocus>
                            <option selected disabled hidden value="">فصيله الدم</option>
                            @foreach($blood_types as $blood_type)
                                <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                            @endforeach
                        </select>
                        @error('blood_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id"
                                autofocus>
                            <option selected disabled hidden value="">المدينه</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="number" class="form-control @error('bags_num') is-invalid @enderror" id="bags_num"
                               name="bags_num" value="{{ old('bags_num') }}" min="1" max="10"
                               aria-describedby="emailHelp" placeholder="عدد اكياس الدم" autofocus>
                        @error('bags_num')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('hospital_name') is-invalid @enderror"
                               id="hospital_name" name="hospital_name" value="{{ old('hospital_name') }}"
                               aria-describedby="emailHelp" placeholder="اسم المستشفي" autofocus>
                        @error('hospital_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('hospital_address') is-invalid @enderror"
                               id="hospital_address" name="hospital_address" value="{{ old('hospital_address') }}"
                               aria-describedby="emailHelp" placeholder="عنوان المستشفي" autofocus>
                        @error('hospital_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                               name="latitude" value="{{ old('latitude') }}" aria-describedby="emailHelp"
                               placeholder="خط الطول مثال (30.79303510)" autofocus>
                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                               name="longitude" value="{{ old('longitude') }}" aria-describedby="emailHelp"
                               placeholder="خط العرض مثال (30.79303510)" autofocus>
                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <textarea placeholder="التفاصيل"
                                  class="form-control @error('details') is-invalid @enderror" name="details"
                                  id="exampleFormControlTextarea1" rows="3"
                                  autofocus>{{ old('details') }}</textarea>
                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="create-btn">
                            <input type="submit" value="إنشاء">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('select[name="governorate_id"]').on('change', function () {
                var governorate_id = $(this).val();
                if (governorate_id) {
                    $.ajax({
                        url: "{{ url('cities?governorate_id=') }}" + governorate_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX Load Did Not Work');
                }
            });
        });
    </script>
@endpush
