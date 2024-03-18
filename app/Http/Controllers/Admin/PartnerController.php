<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all()->sortByDesc('id');

        return view('admin.pages.partners.index' ,compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        $data = [
            'image' => image_manipulate($request->image , 'partners' , 220 , 140)
        ];

        try {
            Partner::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.pages.partners.edit' ,compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PartnerRequest  $request
     * @param  Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        try {
            if ($request->image) {
                image_delete($partner->image , 'partners');
                $data['image'] = image_manipulate($request->image , 'partners' , 220 , 140);

                $partner->update($data);
            }

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->back();
    }
}
