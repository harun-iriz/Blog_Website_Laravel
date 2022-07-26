    <div class="widget bg-dark p-4 text-center">
        <h2 class="widget-title text-white d-inline-block mt-4">Subscribe Blog</h2>
        <p class="mt-4">Bloglardan ücretsiz şekilde haberdar olmak için abone olabilirsin.</p>
        <form action="#">
            <div class="form-group">
                <input type="email" class="form-control bg-transparent rounded-0 my-4" placeholder="Email | (Çok yakında!)" disabled>
                <button class="btn" style="background-color: #E4112F" disabled>Abone ol <img src="{{asset('front/')}}/images/arrow-right.png" alt=""></button>
            </div>
        </form>
    </div>
    <!-- end of subscription-widget -->

    <div class="widget">
        <div class="mb-5 text-center">
            <h2 class="widget-title text-white d-inline-block">Öne Çıkan Gönderiler</h2>
        </div>
        @foreach($articles2 as $article)
        <div class="card post-item bg-transparent border-0 mb-5">
            <a href="{{route('single',$article->slug)}}">
                <img class="card-img-top rounded-0" src="{{$article->image}}" alt="">
            </a>
            <div class="card-body px-0">
                <h2 class="card-title">
                    <a class="text-white opacity-75-onHover" href="{{route('single',$article->slug)}}">{{$article->title}}</a>
                </h2>
                <a href="{{route('single',$article->slug)}}" class="btn btn-primary">Read More <img src="{{asset('front/')}}/images/arrow-right.png" alt=""></a>
            </div>
        </div>
        @endforeach
        <!-- end of widget-post-item -->


    </div>
    <!-- end of post-items widget -->

