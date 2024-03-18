<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('id' , 'desc')->paginate(6);

        if ($request->ajax()) {
            $messages = Message::orderBy( 'id', 'DESC' )->paginate( 6, [ '*' ], 'page', request()->page );

            return view( 'admin.pages.messages.templates.messages', compact( 'messages' ) );
        }

        return view('admin.pages.messages.index' ,compact('messages'));
    }

    public function show(Message $message)
    {
        return view('admin.pages.messages.show' ,compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index');
    }
}
