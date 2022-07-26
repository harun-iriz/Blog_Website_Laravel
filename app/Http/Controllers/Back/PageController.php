<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $pages=Page::all();
        return view('back.pages.index',compact('pages'));
    }

    public function orders(Request $request){
        foreach ($request->get('page') as $key => $order) {
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function create(){
        return view('back.pages.create');
    }

    public function update($id){
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
        ]);

        $page=Page::findOrFail($id);
        $page->title=$request->title;
        $page->content=$request->contentt;
        $page->slug=str_slug($request->title);

        $page->save();
        toastr()->success('Sayfa başarıyla güncellendi.','Başarlı');
        return redirect()->route('admin.page.index');
    }

    public function delete($id){
        $page=Page::find($id);
        $page->delete();
        toastr()->success('Sayfa Başarıyla Silindi','Başarlı');
        return Redirect()->route('admin.page.index');
    }

    public function post(Request $request){
        $request->validate([
            'title'=>'min:3',
        ]);

         $last=Page::orderBy('order','desc')->first();

        $page=new Page();
        $page->title=$request->title;
        $page->content=$request->contentt;
        $page->order=$last->order+1;
        $page->slug=str_slug($request->title);

        $page->save();
        toastr()->success('Sayfa başarıyla oluşturuldu.','Başarlı');
        return redirect()->route('admin.page.index');
    }

    public function switch(Request $request){
        $page=Page::findOrFail($request->id);
        $page->status=$request->statu=="true" ? 1 : 0;
        $page->save();
    }
}
