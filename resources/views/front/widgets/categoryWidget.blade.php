<div class="row">
    <div class="col-lg-5 col-md-8">
        <form class="search-form" type="get" action="{{url('/search')}}">
            <div class="input-group">
                <input type="search" class="form-control bg-transparent shadow-none rounded-0" name="query" disabled placeholder="Search here">
                <div class="input-group-append">
                    <button class="btn" type="submit" disabled>
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="bg-dark p-5 mb-5">
            <div class="row no-gutters">
                <div class="col-xl-6 border-right border-lg-0 pr-0 pr-xl-5">
                    <h1 class="text-white add-letter-space">@if(Request::segment(2)==Null) Blog @else {{$category->name}} @endif </h1>
                    <div class="breadcrumb-wrap mt-3">
                        <a href="/">Anasayfa</a>
                        <span>/</span>
                        <span>@if(Request::segment(2)==Null) Blog @else {{$category->name}} @endif</span>
                    </div>
                </div>
                <div class="col-xl-6 pl-0 pl-xl-5 mt-4 mt-xl-0">
                    <div class="categores-links text-capitalize">
                        <h3 class="text-white add-letter-space mb-3">More Categories:</h3>
                        @foreach($categories as $category)
                            <a class="border" href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
