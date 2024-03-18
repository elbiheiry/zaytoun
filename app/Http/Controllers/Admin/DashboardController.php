<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $messages = Message::all()->sortByDesc('id')->take(5);
        $subscribers = Subscriber::all()->sortByDesc('id')->take(5);
        
        return view('admin.pages.index' , compact('messages' , 'subscribers'));
    }
}
