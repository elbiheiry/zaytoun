<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        \Jenssegers\Date\Date::setLocale(app()->getLocale());
        $articles = Article::all()->sortByDesc('id');

        return view('site.pages.blog.index' ,compact('articles'));
    }

    public function article($slug)
    {
        \Jenssegers\Date\Date::setLocale(app()->getLocale());
        $article = Article::whereSlug($slug)->firstOrFail();
        $related_articles = Article::all()->sortByDesc('id')->where('id' , '!=' , $article->id)->take(4);

        return view('site.pages.blog.article' ,compact('article' , 'related_articles'));
    }

    public function comment(Request $request , $id)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'max:255' , 'email'],
            'comment' => ['required']
        ] , [] , [
            'name' => app()->getLocale() == 'en' ? 'Name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Email' : 'البريد الإلكتروني',
            'comment' => app()->getLocale() == 'en' ? 'message' : 'رسالتك'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            ArticleComment::insert([
                'article_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment
            ]);

            return response()->json( 
                app()->getLocale() == 'en' ? 'Comment has been submitted successfully' : 'تم إضافة تعليقك بنجاح'
                , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
