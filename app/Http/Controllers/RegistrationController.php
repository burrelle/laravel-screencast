<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate the form 
        $this->validate(request(), [
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required|confirmed'
        ]);
        // Create and save the user
        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);
        // Redirect to homepage

        \Mail::to($user)->send(new Welcome($user));

        return redirect()->home();
    }
}
