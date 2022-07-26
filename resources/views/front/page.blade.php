@extends('front.layouts.master')
@section('title', $page->title)
@section('content')
    <div class="container py-4 my-5">

        <div class="row">
            <div class="col-md-9">
                {!! $page->content !!}
            </div>
        </div>
    </div>

@endsection
