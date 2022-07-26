 @extends('front.layouts.master')
 @section('title')
 @section('content')


                <div class="col-lg-8">
                    @foreach($articles as $article)
                    <div class="card post-item bg-transparent border-0 mb-5">
                        <a href="{{route('single',$article->slug)}}">
                            <img class="card-img-top rounded-0" src="{{$article->image}}" alt="">
                        </a>
                        <div class="card-body px-0">
                            <h2 class="card-title">
                                <a class="text-white opacity-75-onHover" href="post-details.html">{{$article->title}}</a>
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
                    <div class="widget text-center">
                        <img class="author-thumb-sm rounded-circle d-block mx-auto" src="{{asset('front/')}}/images/author-sm.png" alt="">
                        <h2 class="widget-title text-white d-inline-block mt-4">About Me</h2>
                        <p class="mt-4">1998 Bursa doğumluyum. Karabük üniversitesi bilgisayar mühendisliği son sınıf öğrencisiyim.</p>
                        <ul class="list-inline mt-3">
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
                    </div>
                    <!-- end of author-widget -->

                    @include('front.widgets.navbarRightWidget')
                </div>
 @endsection

