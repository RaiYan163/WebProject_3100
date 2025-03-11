<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attributes)){

            session()->regenerate();
            session()->flash('success', 'Your account has been created.');

            return redirect('/');
        }


        return back()
            ->withInput()
            ->withErrors(['email' => 'Wrong Credentials']);
    }



    public function destroy()
    {
        auth()->logout();

        session()->flash('success', 'Logged Out Successfully!');

        return redirect('/');
    }
}
