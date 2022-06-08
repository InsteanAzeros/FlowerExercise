<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticated(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
        ]);

        session(['email' => $request->email]);

        return redirect('/flowers');
    }

    public function logout(Request $request)
    {
        // Remove one specific item from the session :
        $request->session()->forget('email');

        // Remove everything from the session :
        // $request->session()->flush();

        return redirect('flowers');
    }

    public function register()
    {
        return view('register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'poster' => 'required|image'
        ]);

        // Upload the file
        $fileName = $request->username . '.' . $request->poster->extension();
        $publicPath = public_path('uploads');
        $request->poster->move($publicPath, $fileName);

        // Insert new user in DB
        $newUser = new CustomUser;

        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->poster = $fileName;

        $newUser->save();

        return redirect('/flowers')->with('success', 'Registered successfully');
    }
}
