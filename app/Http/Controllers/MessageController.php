<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('to_user_id', Auth::id())
                            ->orWhere('from_user_id', Auth::id())
                            ->latest()
                            ->get()
                            ->groupBy(function($message) {
                                return $message->from_user_id == Auth::id() ? $message->to_user_id : $message->from_user_id;
                            });

        return view('messages.index', compact('messages'));
    }

    public function show(User $user)
    {
        $messages = Message::where(function($query) use ($user) {
            $query->where('from_user_id', Auth::id())
                  ->where('to_user_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('from_user_id', $user->id)
                  ->where('to_user_id', Auth::id());
        })->oldest()->get();

        Message::where('from_user_id', $user->id)
               ->where('to_user_id', Auth::id())
               ->update(['is_read' => true]);

        return view('messages.show', compact('messages', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'admin_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->from_user_id = Auth::id();
        $message->to_user_id = $request->admin_id;
        $message->content = $request->content;
        $message->save();

        return redirect()->route('messages.show', $message->to_user_id)->with('success', 'Mesaj gönderildi.');
    }

    public function create()
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        return view('messages.create', compact('admins'));
    }
}
