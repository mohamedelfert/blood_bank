@extends('front.index')
@section('content')

    <!--intro-->
    <div class="intro">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                التركيز على الشكل الخارجي للنص.
                            </p>
{{--                            <a href="#">المزيد</a>--}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                التركيز على الشكل الخارجي للنص.
                            </p>
{{--                            <a href="#">المزيد</a>--}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                التركيز على الشكل الخارجي للنص.
                            </p>
{{--                            <a href="#">المزيد</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p><span>بنك الدم</span> {{ mb_strlen($settings->about_app) > 245 ? mb_substr($settings->about_app,0,245) : $settings->about_app }} </p>
            </div>
        </div>
    </div>

    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach($posts as $post)
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('Attachments/' . $post->title . '/' . $post->image) }}" height="200" class="card-img-top" alt="...">
                                <a href="{{ route('post',$post->id) }}" class="click">المزيد</a>
                            </div>
                            <a class="favourite">
                                <i id="{{$post->id}}" onclick="toggleFavourite(this)" class="fab fa-gratipay {{$post->is_favourite ? 'second-heart' : 'first-heart'}}"></i>
                            </a>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">{{ mb_strlen($post->title) > 30 ? mb_substr($post->title,0,30) : $post->title }}</h5>
                                <p class="card-text">{{ mb_strlen($post->content) > 40 ? mb_substr($post->content,0,40) : $post->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form action="{{ route('donation-requests-filter') }}" method="POST" class="row filter">
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
                                <h2 dir="ltr">B+</h2>
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
                <div class="more">
                    <a href="{{ route('donation-requests') }}">المزيد</a>
                </div>
            </div>
        </div>
    </div>

    <!--contact-->
    <div class="contact">
        <div class="container">
            <div class="col-md-7">
                <div class="title">
                    <h3>اتصل بنا</h3>
                </div>
                <p class="text">يمكنك الاتصال بنا للاستفسار عن معلومة وسيتم الرد عليكم</p>
                <div class="row whatsapp">
                    <a href="{{ 'https://wa.me/'.$settings->phone }}" target="_blank">
                        <img src="{{ asset('design/front/imgs/whats.png') }}">
                        <p dir="ltr">+002 {{ $settings->phone }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--app-->
    <div class="app">
        <div class="container">
            <div class="row">
                <div class="info col-md-6">
                    <h3>تطبيق بنك الدم</h3>
                    <p> {{ mb_strlen($settings->about_app) > 100 ? mb_substr($settings->about_app,0,100) : $settings->about_app }} </p>
                    <div class="download">
                        <h4>متوفر على</h4>
                        <div class="row stores">
                            <div class="col-sm-6">
                                <a href="{{ $settings->android_url }}" target="_blank">
                                    <img src="{{ asset('design/front/imgs/google.png') }}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ $settings->ios_url }}" target="_blank">
                                    <img src="{{ asset('design/front/imgs/ios.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="screens col-md-6">
                    <img src="{{ asset('design/front/imgs/App.png') }}">
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function toggleFavourite(heart){
            var post_id = heart.id;
            $.ajax({
                url : '{{ url(route('toggle-favourite')) }}',
                type : 'post',
                data : {_token:"{{csrf_token()}}",post_id:post_id},
                success : function (data){
                    if(data.status == 1){
                        console.log(data);
                        var currentClass = $(heart).attr('class');
                        if(currentClass.includes('first')){
                            $(heart).removeClass('first-heart').addClass('second-heart');
                        }else {
                            $(heart).removeClass('second-heart').addClass('first-heart');
                        }
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback
                    alert(errorMessage);
                }
            })
        }
    </script>
@endpush
