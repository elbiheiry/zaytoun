<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('site.pages.contact.index');
    }

    public function store(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'max:255' , 'email'],
            'phone' => ['required'],
            'subject' => ['required' , 'string' , 'max:255'],
            'message' => ['required']
        ] , [] , [
            'name' => app()->getLocale() == 'en' ? 'Name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Email' : 'البريد الإلكتروني',
            'phone' => app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف',
            'subject' => app()->getLocale() == 'en' ? 'Subject' : 'عنوان رسالتك',
            'message' => app()->getLocale() == 'en' ? 'Message' : 'رسالتك'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            Message::create($request->all());

            return response()->json( 
                app()->getLocale() == 'en' ? 'Your message has been sent ,  we will reply ASAP' : 'تم إرسال رسالتك وسيتم التواصل معكم في أقرب وقت ممكن'
                , 200);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
    }
}
