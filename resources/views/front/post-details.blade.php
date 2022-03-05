@extends('front.index')
@section('content')

    <div class="article-details">
        <div class="inside-article">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('posts') }}">المقالات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="article-image">
                    <img src="{{ asset('Attachments/' . $post->title . '/' . $post->image) }}" height="450">
                </div>
                <div class="article-title col-12">
                    <div class="h-text col-6">
                        <h4>{{ $post->title }}</h4>
                    </div>
                    <div class="icon col-6">
                        <button type="button" class="{{ $post->is_favourite ? 'second' : 'first' }}"><i class="fab fa-gratipay"></i></button>
                    </div>
                </div>

                <!--text-->
                <div class="text">
                    <p>{{ $post->content }}</p>
                </div>

                <!--articles-->
                <div class="articles">
                    <div class="title">
                        <div class="head-text">
                            <h2>مقالات ذات صلة</h2>
                        </div>
                    </div>
                    <div class="view">
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
