<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{$config->title}}</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('front/')}}/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/plugins/fontawesome/css/all.css">

    <!-- Main Stylesheet -->
    <link href="{{asset('front/')}}/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset($config->favicon)}}" type="image/png">
    <link rel="icon" href="{{asset($config->favicon)}}" type="image/x-icon">

</head>

<body>

<!-- START preloader-wrapper -->
<div class="preloader-wrapper">
    <div class="preloader-inner">
        <div class="spinner-border text-red"></div>
    </div>
</div>
<!-- END preloader-wrapper -->

<!-- START main-wrapper -->
<section class="d-flex">

    <!-- start of sidenav -->
    <aside><div class="sidenav position-sticky d-flex flex-column justify-content-between">
            <a class="logo_name" href="/">
                @if($config->logo!=null)
                <img src="{{asset($config->logo)}}" width="150">
                @else
                {{$config->title}}
                @endif
            </a>
            <!-- end of navbar-brand -->

            <div class="navbar navbar-dark my-4 p-0 font-primary">
                <ul class="navbar-nav w-100">

                    <li class="nav-item @if(Request::segment(1)==Null) active @endif">
                        <a class="nav-link text-white px-0 pt-0" href="/">Anasayfa</a>
                    </li>

                    @foreach($pages as $page)
                        <li class="nav-item @if(Request::segment(1)==$page->slug) active @endif">
                            <a class="nav-link text-white px-0 pt-0" href="{{route('page',$page->slug)}}">{{$page->title}}</a>
                        </li>
                    @endforeach

                    <li class="nav-item @if(Request::segment(1)=='blog' || Request::segment(1)=='kategori') active @endif">
                        <a class="nav-link text-white px-0 pt-0" href="/blog">Blog</a>
                    </li>

                    <li class="nav-item @if(Request::segment(1)=='iletisim') active @endif">
                        <a class="nav-link text-white px-0 pt-0" href="/iletisim">İletişim</a>
                    </li>

                </ul>
            </div>
            <!-- end of navbar -->
            <ul class="list-inline nml-2">
                @php($socials=['twitter','instagram','github','linkedin'])
                @foreach($socials as $social)
                    @if($config->$social!=null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{$config->$social}}" class="text-white text-red-onHover pr-2">
                                <span class="fab fa-{{$social}}"></span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <!-- end of social-links -->
        </div></aside>
    <!-- end of sidenav -->
    <div class="main-content">
        <!-- start of mobile-nav -->
        <header class="mobile-nav pt-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a class="logo_name" href="/">
                            <img src="{{asset($config->logo)}}" width="70">
                        </a>
                    </div>
                    <div class="col-4 text-right">
                        <button class="nav-toggle bg-transparent border text-white">
                            <span class="fas fa-bars"></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <div class="nav-toggle-overlay"></div>
        <!-- end of mobile-nav -->
        <div class="container pt-4 mt-5">
            <div class="row justify-content-between">
