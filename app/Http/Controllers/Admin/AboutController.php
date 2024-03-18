<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * settings index page
     *
     * @return Response
     */
    public function index()
    {
        $about = About::firstOrFail();

        return view('admin.pages.about.index' ,compact('about'));
    }

    /**
     * update in settings table
     *
     * @param AboutRequest $request
     * @return Response
     */
    public function update(AboutRequest $request)
    {
        $about = About::firstOrFail();

        $data = [
            'en' => [
                'title1' => $request->title1_en,
                'title2' => $request->title2_en,
                'description1' => $request->description1_en,
                'description2' => $request->description2_en,
                'mission' => $request->mission_en,
                'vision' => $request->vision_en,
                'message' => $request->message_en
            ],
            'ar' => [
                'title1' => $request->title1_ar,
                'title2' => $request->title2_ar,
                'description1' => $request->description1_ar,
                'description2' => $request->description2_ar,
                'mission' => $request->mission_ar,
                'vision' => $request->vision_ar,
                'message' => $request->message_ar
            ],
            'years' => $request->years
        ];

        try {

            if ($request->image) {
                image_delete($about->image , 'about');
                $data['image'] = image_manipulate($request->image , 'about' , 555 , 430);
            }
            
            $about->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
