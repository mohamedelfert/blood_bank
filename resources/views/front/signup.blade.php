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
                    <form>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                        <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فصيلة الدم">

                        <select class="form-control" id="governorates" name="governorate">
                            <option selected disabled hidden value="">المحافظة</option>
                            <option value="1">الدقهلية</option>
                            <option value="2">الغربية</option>
                        </select>

                        <select class="form-control" id="cities" name="city">
                            <option  selected disabled hidden value="">المدينة</option>
                        </select>

                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                        <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">

                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
