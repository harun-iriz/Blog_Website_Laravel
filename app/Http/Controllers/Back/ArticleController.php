<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles']=Article::orderBy('created_at','Desc')->get();
        return view('back.articles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2024'
        ]);

        $article=new Article();
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->contentt;
        $article->slug=str_slug($request->title);

        if ($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='/uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Makale başarıyla oluşturuldu.','Başarlı');
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();
        return view('back.articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2024'
        ]);

        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->contentt;
        $article->slug=str_slug($request->title);

        if ($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='/uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Makale başarıyla güncellendi.','Başarlı');
        return redirect()->route('admin.makaleler.index');
    }

    public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1 : 0;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        Article::find($id)->delete();
        toastr()->success('Makale, silinen makalelere taşındı.','Başarlı');
        return Redirect()->route('admin.makaleler.index');
    }

    public function trashed(){
        $articles=Article::onlyTrashed()->orderBy('deleted_at','Desc')->get();
        return view('back.articles.trashed',compact('articles'));
    }

    public function recover($id){
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale Başarıyla Kurtarıldı','Başarlı');
        return Redirect()->back();
    }

    public function hardDelete($id){
        $article=Article::onlyTrashed()->find($id);
        // FİLE'da foto silme işlemi çalışmıyoru. Sorun bulunamadı!!!
        if(File::exists($article->image)){
            File::delete(public_path($article->image));
        }
        $article->forceDelete();
        toastr()->success('Makale Başarıyla Silindi','Başarlı');
        return Redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
