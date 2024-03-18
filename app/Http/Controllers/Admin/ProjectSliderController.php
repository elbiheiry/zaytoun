<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectSliderRequest;
use App\Models\ProjectSlider;
use Illuminate\Http\Request;

class ProjectSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param Project $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = ProjectSlider::all()->where('project_id' , $id)->sortByDesc('id');

        return view('admin.pages.projects.sliders.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectSliderRequest  $request
     * @param Project $id
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectSliderRequest $request , $id)
    {
        $data = [
            'image' => image_manipulate($request->image , 'projects' , 700 , 400),
            'project_id' => $id
        ];

        try {
            ProjectSlider::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProjectSlider $image
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectSlider $image)
    {
        return view('admin.pages.projects.sliders.edit' ,compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectSliderRequest  $request
     * @param  ProjectSlider $image
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectSliderRequest $request, ProjectSlider $image)
    {
        try {
            if ($request->image) {
                image_delete($image->image , 'projects');
                $data['image'] = image_manipulate($request->image , 'projects' , 700 , 400);

                $image->update($data);
            }

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProjectSlider $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectSlider $image)
    {
        $image->delete();

        return redirect()->back();
    }
}
