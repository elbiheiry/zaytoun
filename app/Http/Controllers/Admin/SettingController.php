<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * settings index page
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.pages.settings.index');
    }

    /**
     * update in settings table
     *
     * @param SettingRequest $request
     * @return Response
     */
    public function update(SettingRequest $request)
    {
        $data = [
            'en' => [
                'address' => $request->address_en,
                'about' => $request->about_en,
                'hours' => $request->hours_en,
                'copyright' => $request->copyright_en
            ],
            'ar' => [
                'address' => $request->address_ar,
                'about' => $request->about_ar,
                'hours' => $request->hours_ar,
                'copyright' => $request->copyright_ar
            ],
            'email' => $request->email,
            'phone' => $request->phone,
            'map' => $request->map
        ];

        try {
            Setting::firstOrFail()->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
