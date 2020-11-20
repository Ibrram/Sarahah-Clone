<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages()
    {
        $messages = Auth()->user()->messages()->latest()->get();
        return view('user.messages')->with('messages', $messages);
    }

    public function user($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        if ($user->id !== Auth()->id()) {
            return view('user.send-message')->with('user', $user);
        } else {
            return redirect()->to(route('messages'));
        }
    }

    public function msgStore(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|min:15|max:255'
        ]);
        $user = User::findOrFail($id);
        $user->messages()->create([
            'message'   => $request->message
        ]);
        return redirect(route('get.user', $user->username))->with('message', 'Your Message send successfully');
    }
}
