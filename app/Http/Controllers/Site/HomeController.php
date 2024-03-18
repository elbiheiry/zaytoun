<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\Candidate;
use App\Models\Content;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {

    // dd(Hash::make("D%4[z/wnx_L[jLA'"));
        \Jenssegers\Date\Date::setLocale(app()->getLocale());

        $projects = Project::all()->take(2);
        $about = About::firstOrFail();
        $articles = Article::all()->sortByDesc('id')->take(6);
        $content = Content::firstOrFail();

        return view('site.pages.index' , compact('projects' , 'content' , 'about' , 'articles'));
    }
    
    public function partners()
    {
        $partners = Partner::all()->sortByDesc('id');
        $content = Content::firstOrFail();

        return view('site.pages.partners.index' ,compact('partners' , 'content'));
    }
    
    public function careers()
    {
        $content = Content::firstOrFail();

        return view('site.pages.careers.index' ,compact('content'));
    }
    
    public function privacy()
    {
        $content = Content::firstOrFail();

        return view('site.pages.privacy.index' ,compact('content'));
    }

    public function subscribe(Request $request)
    {
        $validator = validator($request->all() , [
            'email' => ['required' , 'email' , 'string' , 'unique:subscribers,email' , 'max:255']
        ] , [] , [
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            Subscriber::create($request->all());

            return response()->json( 
                app()->getLocale() == 'en' ? 'Email added successfully' : 'تم إضافه البريد الإلكتروني بنجاح'
                , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function apply_career(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'max:255' , 'email'],
            'phone' => ['required'],
            'title' => ['required' , 'string' , 'max:255'],
            'cv' => ['required' ,'file' ,'mimes:pdf,docx']
        ] , [] , [
            'name' => app()->getLocale() == 'en' ? 'Name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Email' : 'البريد الإلكتروني',
            'phone' => app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف',
            'title' => app()->getLocale() == 'en' ? 'Job Title' : 'المسمي الوظيفي',
            'cv' => app()->getLocale() == 'en' ? 'Upload CV' : 'تحميل السيرة الذاتية'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }
        $data = $request->all();

        $data['cv'] = image_manipulate($request->cv , 'candidates');

        try {
            Candidate::create($data);

            return response()->json( 
                app()->getLocale() == 'en' ? 'Your message has been sent ,  we will reply ASAP' : 'تم إرسال رسالتك وسيتم التواصل معكم في أقرب وقت ممكن'
                , 200);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
    }
}
