<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use DB; 

class NewsController extends Controller
{
    public function submitInsert(NewsRequest $req) {

        $news = new News();
        $news->theme_news = $req->input("theme_news");
        $news->text_news = $req->input("text_news");
        $news->date_news = $req->input("date_news");

        $news->timestamps = false;
        $news->save();
        return redirect()->route("news-form");
    }
    
    public function submitUpdate(NewsRequest $req) {

        $recid = $req->input("recid");
        $theme_news = $req->input("theme_news");
        $text_news = $req->input("text_news");
        $date_news = $req->input("date_news");

        DB::update('update news set theme_news = ? , text_news = ?, date_news = ? where recid = ?', [$theme_news , $text_news , $date_news , $recid]);
        
        return redirect()->route("news-form");
    }

    public function submitDelete($str_id) {

        News::where('recid', substr($str_id, 1) ) -> delete();
        
        return redirect()->route("news-form");
    }

    public function allData() {

        $news = new News;

        return view("news", ["data" => $news->orderBy('recid', 'desc')->get()]);
    }

}
