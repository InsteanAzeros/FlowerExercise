<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
