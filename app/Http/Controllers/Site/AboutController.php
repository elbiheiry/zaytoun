<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CoreValue;
use App\Models\Heritage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about= About::firstOrFail();
        $values = CoreValue::all()->sortByDesc('id');
        $heritages = Heritage::all()->sortByDesc('id');

        return view('site.pages.about.index' ,compact('about' , 'values' , 'heritages'));
    }
}
