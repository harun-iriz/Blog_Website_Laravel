</div>
</div>
<!-- start of footer -->
<footer class="bg-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-5 px-4 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">En Çok Okunanlar</h5>
                <div class="navbar navbar-dark my-4 p-0 font-primary">

                    <ul class="navbar-nav w-100">
                        <table class="table table-bordered">
                            <tbody>
                        @foreach($articles2 as $article)
                                <tr>
                                    <td>
                                        <a href="{{route('single',$article->slug)}}">
                                            <img style="width: 150px" class="card-img-top rounded-0" src="{{$article->image}}">
                                        </a>
                                    </td>
                                    <td><a class="nav-link float-left" href="{{route('single',$article->slug)}}">{{$article->title}}</a></td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="widget text-center">
                    <h5 class="font-primary text-white mb-4">Hakkımda</h5>
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
            </div>
            <div class="col-lg-3 col-sm-6 mb-5">
                <h5 class="font-primary text-white mb-4">Sayfalar</h5>
                <ul class="list-unstyled">
                    <li><a href="/">Anasayfa</a></li>
                    @foreach($pages as $page)
                        <li><a href="{{route('page',$page->slug)}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/iletisim">İletişim</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer -->
</div>

</section>
<!-- END main-wrapper -->

<!-- All JS Files -->
<script src="{{asset('front/')}}/plugins/jQuery/jquery.min.js"></script>
<script src="{{asset('front/')}}/plugins/bootstrap/bootstrap.min.js"></script>

<!-- Main Script -->
<script src="{{asset('front/')}}/js/script.js"></script>
</body>
</html>
