<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SignOut extends Controller
{
    public function sign_out(Request $request){
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // $sign_out = Carbon::now();
        $sign_out = new \App\SignOut;
        // $sign_out = new SignOut();
        $sign_out->name = $request->input('name');
        $sign_out->save();

        return view('/sign-out');
    }
}
