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
                        @foreach($posts as $post)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{ asset('Attachments/' . $post->title . '/' . $post->image) }}" height="200" class="card-img-top" alt="...">
                                    <a href="{{ route('post',$post->id) }}" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
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

@endsection
