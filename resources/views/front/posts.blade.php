@extends('front.index')
@section('content')

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
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('design/front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('post') }}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                <p class="card-text">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى،
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('design/front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('post') }}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                <p class="card-text">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى،
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('design/front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('post') }}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                <p class="card-text">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى،
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('design/front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('post') }}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                <p class="card-text">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى،
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="photo">
                                <img src="{{ asset('design/front/imgs/p2.jpg') }}" class="card-img-top" alt="...">
                                <a href="{{ route('post') }}" class="click">المزيد</a>
                            </div>
                            <a href="#" class="favourite">
                                <i class="far fa-heart"></i>
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                <p class="card-text">
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى،
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
