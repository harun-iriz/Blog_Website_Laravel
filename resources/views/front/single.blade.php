@extends('front.layouts.master')
@section('title','Harun IRIZ')
@section('content')
<div class="row justify-content-between">
    <div class="col-lg-8 mt-4">
        <h1 style="color: #fff">{!!$article->title!!}</h1>
        <hr style="background-color: #fff">

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
        <div class="my-5">
            {!!$article->content!!}
        </div>

    </div>
    <div class="col-lg-4 col-md-5">
        @include('front.widgets.navbarRightWidget')
    </div>
</div>

@endsection
