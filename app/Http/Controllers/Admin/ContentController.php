<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentRequest;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * settings index page
     *
     * @return Response
     */
    public function index()
    {
        $content = Content::firstOrFail();

        return view('admin.pages.content.index' ,compact('content'));
    }

    /**
     * update in settings table
     *
     * @param ContentRequest $request
     * @return Response
     */
    public function update(ContentRequest $request)
    {
        $content = Content::firstOrFail();

        $data = [
            'en' => [
                'description1' => $request->description1_en,
                'description2' => $request->description2_en,
                'description3' => $request->description3_en,
                'description4' => $request->description4_en,
            ],
            'ar' => [
                'description1' => $request->description1_ar,
                'description2' => $request->description2_ar,
                'description3' => $request->description3_ar,
                'description4' => $request->description4_ar,
            ]
        ];

        try {
            $content->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
