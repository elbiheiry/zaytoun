<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Traits\ArticleTrait;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Message;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ArticleTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('id');

        return view('admin.pages.articles.index' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try {
            $this->store_row($request);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.pages.articles.edit' ,compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemberRequest  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        try {
            $this->update_row($request , $article);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }

    public function comments(Request $request ,Article $article)
    {
        $comments = ArticleComment::where('article_id' , $article->id)->orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $comments = ArticleComment::orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.articles.templates.comments', compact( 'comments' ) );
        }

        return view('admin.pages.articles.comments' ,compact('comments'));
    }

    public function delete_comment($id)
    {
        ArticleComment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
