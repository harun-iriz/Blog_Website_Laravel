@extends('back.layouts.master')
@section('title',$article->title.' makalesini güncelle')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('admin.makaleler.update',$article->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Fotoğraf</label><br>
                    <img src="{{asset($article->image)}}" width="200" class="img-thumbnail">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea name="contentt" class="form-control" rows="4" required>{!!$article->content!!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('css')
    <script src="https://cdn.tiny.cloud/1/q0kxhej5pa4dyptnk59j8bro0hkx05s4v86jflz2wpca4kuu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter link image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection

