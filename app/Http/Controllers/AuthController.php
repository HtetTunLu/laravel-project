<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use Illuminate\Http\Request;
use Mail;

class AuthController extends Controller
{
    public function show()
    {
        $mailData = [
            'title' => 'Send mail from Nicesnippets.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('leonartex15898@gmail.com')->send(new Order($mailData));
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'email',
            'password' => 'required',
        ]);
        if (
            auth()->attempt(
                request()->only([
                    'email',
                    'password'
                ]),
                request()->filled('remember')
            )
        ) {
            return redirect('main');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid Credentials!']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
