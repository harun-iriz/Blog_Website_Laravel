<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

//Models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;

class Homepage extends Controller
{
    public function __construct(){
        if(Config::find(1)->active==0){
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
        view()->share('categories',Category::where('status',1)->orderBy('name','Asc')->get());
        view()->share('config',Config::find(1));
    }

    public function index(){
        $data['articles']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->paginate(5);
        $data2['articles2']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('hit','DESC')->paginate(3);
        return view('front.homepage',$data,$data2);
    }


    public function single($slug){
        $article=Article::whereSlug($slug)->first() ?? abort(404);
        $article->increment('hit');
        $data['article']=$article;
        $data['articles2']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('hit','DESC')->paginate(3);
        return view('front.single',$data);
    }

    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(404);
        $data['category']=$category;
        $data['articles']= Article::where('category_id',$category->id)->with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->get();
        $data2['articles2']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('hit','DESC')->paginate(3);
        return view('front.category',$data,$data2);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(404);
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function blog(){
        $data['articles']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->get();
        $data2['articles2']= Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('hit','DESC')->paginate(3);
        return view('front.blog',$data,$data2);
    }

    public function contact(){
        $data['articles']=Article::orderBy('created_at','Desc')->get();
        return view('front.contact',$data);
    }

    public function contactpost(Request $request){

        Mail::send([],[],function ($message) use ($request){
            $message->from('harun@blogsitesi.com','Harun IRIZ');
            $message->to('haruniriz@gmail.com');
            $message->setBody('Mesajı gönderen:'.$request->firstName.' ' .$request->lastName.'<br/>
                                Mesajı Gönderen Mail: '.$request->email.'<br/>
                                Mesaj Konusu:'.$request->topic.'<br/>
                                Mesaj: '.$request->message.'<br/><br/>
                                Mesaj Gönderilme Tarihi: '.now().'','text/html');
            return redirect()->to('iletisim')->send()->with('success','Mesajınız başarılı bir şekilde gönderilmiştir. Teşekkürler!' );

        });

        /*
         * Veritabanına kaydetmek için kullanılıyor: (Ancak mail kısmında sorun var!!!)
        $contact=new Contact;
        $contact->firstName=$request->firstName;
        $contact->lastName=$request->lastName;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesaj gönderildi.');
        */
    }

}
