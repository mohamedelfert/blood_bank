@extends('front.index')
@section('content')

    <div class="create">
        <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="الإسم" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="البريد الإلكترونى" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input placeholder="تاريخ الميلاد" class="form-control @error('d_o_b') is-invalid @enderror" type="text" name="d_o_b" value="{{ old('d_o_b') }}" onfocus="(this.type='date')" id="date" autofocus>
                        @error('d_o_b')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <select class="form-control @error('blood_type_id') is-invalid @enderror" id="blood_type_id" name="blood_type_id" autofocus>
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

                        <select class="form-control @error('governorate_id') is-invalid @enderror" id="governorate_id" name="governorate_id" autofocus>
                            <option selected disabled hidden value="">المحافظة</option>
                            @foreach($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                            @endforeach
                        </select>
                        @error('governorate_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" autofocus>
                            <option  selected disabled hidden value="">المدينة</option>
{{--                            @foreach($cities as $city)--}}
{{--                                <option value="{{ $city->id }}">{{ $city->name }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                        @error('city_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" aria-describedby="emailHelp" placeholder="رقم الهاتف" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input placeholder="آخر تاريخ تبرع" class="form-control @error('last_donation_date') is-invalid @enderror" name="last_donation_date" value="{{ old('last_donation_date') }}" type="text" onfocus="(this.type='date')" id="date" autofocus>
                        @error('last_donation_date')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="كلمة المرور" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور" autofocus>
                        @error('password_confirmation')
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
        $(document).ready(function() {
            $('select[id="governorate_id"]').on('change', function() {
                var governorate_id = $(this).val();
                if (governorate_id) {
                    $.ajax({
                        url: "{{ url('api/v1/cities?governorate_id=') }}" + governorate_id,
                        type: "GET",
                        success: function(data) {
                           if(data.status == 1){
                               $('select[id="city_id"]').empty();
                               $.each(data.data, function(key, value) {
                                   $('select[id="city_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                               });
                               // $("#city_id").empty();
                               // $.each(data.data, function (index, city) {
                               //     $("#city_id").append('<option value="'+city.id+'">'+city.name+'</option>');
                               // });
                           }
                        }
                    });
                } else {
                    console.log('AJAX Load Did Not Work');
                }
            });
        });
    </script>
@endpush
