<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SignIn extends Controller
{
    public function sign_in(Request $request){
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // $sign_in = Carbon::now();
        $sign_in = new \App\SignIn;
        $sign_in->name = $request->input('name');
        $sign_in->save();

        return view('/sign-in');
    }
}
