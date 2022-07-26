@extends('back.layouts.master')
@section('title',$page->title.' sayfasını güncelle')
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
            <form method="post" action="{{route('admin.page.edit.post',$page->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea id="editor" name="contentt" class="form-control" rows="4" required>{!!$page->content!!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('css')
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height': 300
                }
            );
        });
    </script>
@endsection

