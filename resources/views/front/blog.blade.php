@extends('front.layouts.master')
@section('title','Blog')
@section('content')

<div class="container py-4 my-5">
    @include('front.widgets.categoryWidget')
    <div class="row justify-content-between">

        <div class="col-lg-8">
            @foreach($articles as $article)
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{route('single',$article->slug)}}">
                        <img class="card-img-top rounded-0" src="{{$article->image}}" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover" href="{{route('single',$article->slug)}}">{{$article->title}}</a>
                        </h2>
                        <ul class="post-meta mt-3">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#">{{$article->created_at->diffForHumans()}}</a>
                            </li>
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
                            </li>
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-solid fa-eye text-primary"></span>
                                <a class="ml-1" href="#">{{$article->hit}}</a>
                            </li>
                        </ul>
                        <p class="card-text my-4">{!! str_limit($article->content,200) !!}</p>
                        <a href="{{route('single',$article->slug)}}" class="btn btn-primary">Read More <img src="{{asset('front/')}}/images/arrow-right.png" alt=""></a>
                    </div>
                </div>
            @endforeach
            <!-- end of post-item -->
        </div>
        <div class="col-lg-4 col-md-5">
            @include('front.widgets.navbarRightWidget')
        </div>


    </div>
</div>
@endsection
