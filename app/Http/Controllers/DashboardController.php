<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user()
    {
        // $users = User::all();

        return view('/dashboard/dashboard');
    }

    public function view_profile(){
        $users = User::all();
        return view('dashboard/view-profile', compact('users'));
    }

    public function edit_profile(){
        $users = User::all();
        return view('dashboard/edit-profile', compact('users'));
    }

    public function update(Request $request){
        $user = Auth::user();


        $user->name = $request->input('name');
        $user->position = $request->input('position');
        $user->office = $request->input('office');
        $user->age = $request->input('age');
        $user->startdate = $request->input('startdate');
        $user->salary = $request->input('salary');

        $user->update($request->all());


        return redirect()->back()->with('success', 'Profile updated succesfully!');
    }
}
