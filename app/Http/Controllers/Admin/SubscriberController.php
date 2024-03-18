<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $subscribers = Subscriber::orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $subscribers = Subscriber::orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.subscribers.templates.subscribers', compact( 'subscribers' ) );
        }

        return view('admin.pages.subscribers.index' ,compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index');
    }
}
