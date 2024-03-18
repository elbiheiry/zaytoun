<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CoreValueRequest;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = CoreValue::all()->sortByDesc('id');

        return view('admin.pages.about.values.index' , compact('values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CoreValueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoreValueRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'description' => $request->description_ar
            ],
            'icon' => $request->icon
        ];
        try {
            CoreValue::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = CoreValue::findOrFail($id);

        return view('admin.pages.about.values.edit' ,compact('value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CoreValueRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoreValueRequest $request, $id)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'description' => $request->description_ar
            ],
            'icon' => $request->icon
        ];
        try {
            CoreValue::findOrFail($id)->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoreValue::findOrFail($id)->delete();

        return redirect()->back();
    }
}
