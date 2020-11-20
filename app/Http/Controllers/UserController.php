<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userSettings()
    {
        return view('user.settings')->with('user', Auth()->user());
    }

    public function general(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:5|max:45',
            'email' => 'required|email:filter'
        ]);
        Auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);
        return redirect()->to(route('get.settings'))->with('success_general', 'Your data has been update successfully');
    }

    public function password(Request $request)
    {
        $user = Auth()->user();
        $request->validate([
            'current' => ['required', function($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail('The current password is incorrect.');
                }
            }],
            'new'   => 'required|min:8',
            'confirm'   => 'required|same:new'
        ]);

        Auth()->user()->update([
            'password'  => Hash::make($request->new)
        ]);

        return redirect()->to(route('get.settings'))->with('success_password', 'Password has been changed successfully');

    }
}
