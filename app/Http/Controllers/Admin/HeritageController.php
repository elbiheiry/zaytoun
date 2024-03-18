<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeritageRequest;
use App\Models\Heritage;
use Illuminate\Http\Request;

class HeritageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heritages = Heritage::all()->sortByDesc('id');

        return view('admin.pages.about.heritages.index' , compact('heritages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HeritageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeritageRequest $request)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ],
            'image' => image_manipulate($request->image , 'heritages' , 540 , 540)
        ];

        try {
            Heritage::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Heritage $heritage
     * @return \Illuminate\Http\Response
     */
    public function edit(Heritage $heritage)
    {
        return view('admin.pages.about.heritages.edit' ,compact('heritage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HeritageRequest $request
     * @param  Heritage $heritage
     * @return \Illuminate\Http\Response
     */
    public function update(HeritageRequest $request, Heritage $heritage)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ]
        ];

        if ($request->image) {
            image_delete($heritage->image , 'heritages');
            $data['image'] = image_manipulate($request->image , 'heritages' , 540 , 540);
        }

        try {
           $heritage->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Heritage $heritage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heritage $heritage)
    {
        $heritage->delete();

        return redirect()->back();
    }
}
