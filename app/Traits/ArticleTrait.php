<?php

namespace App\Traits;

use App\Models\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;

trait ArticleTrait {
    public function store_row($request)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ],
            'slug' => SlugService::createSlug(Article::class ,'slug' , $request->title_en , ['unique' => true]),
            'inner_image' => image_manipulate($request->inner_image , 'articles' , 1920 , 1080),
            'outer_image' => image_manipulate($request->outer_image , 'articles' , 768 , 576)
        ];

        Article::create($data);
    }

    public function update_row($request , $article)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ]
        ];

        if ($request->inner_image) {
            image_delete($article->inner_image , 'articles');
            $data['inner_image'] = image_manipulate($request->inner_image , 'articles' ,1920 , 1080);
        }

        if ($request->outer_image) {
            image_delete($article->outer_image , 'articles');
            $data['outer_image'] = image_manipulate($request->outer_image , 'articles' , 768 , 576);
        }

        if ($request->title_en != $article->translate('en')->title) {
            $data['slug'] = SlugService::createSlug(Article::class ,'slug' , $request->title_en , ['unique' => true]);
        }

        $article->update($data);
    }
}