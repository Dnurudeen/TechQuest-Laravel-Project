<?php

namespace App\Http\Controllers;


use App\Http\Controllers\SignIn;
use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use app\Account;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
      }
      public function admin() {
        $sign_ins = \App\SignIn::all();
        $sign_outs = \App\SignOut::all();
        $salary = User::pluck('salary');
        return view('/admin/dashboard', ['salary' => $salary], compact('sign_ins', 'sign_outs'));
      }

      public function users(){
        $users = User::all();
        return view('/admin/staffs', compact('users'));
    }

    public function signins(){
        $sign_ins = \App\SignIn::all();
        return view('/admin/sign-in', compact('sign_ins'));
    }
    public function signouts(){
        $sign_outs = \App\SignOut::all();
        return view('/admin/sign-out', compact('sign_outs'));
    }

    public function viewstaff($id){
        $users = User::find($id);
        return view('/admin/view-staff', compact('users'));
    }

    public function addstaff(){
        return view('/admin/add-staff');
    }

    public function store(Request $request){
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'position' => 'required|max:255',
            'office' => 'required|max:255',
            'age' => 'required|max:3',
            'startdate' => 'required|max:255',
            'salary' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $addstaff = new User();
        $addstaff->name = $request->input('fname') . ' ' . $request->input('lname');
        $addstaff->position = $request->input('position');
        $addstaff->office = $request->input('office');
        $addstaff->age = $request->input('age');
        $addstaff->startdate = $request->input('startdate');
        $addstaff->salary = $request->input('salary');
        $addstaff->role = $request->input('role');
        $addstaff->email = $request->input('email');
        $addstaff->password = Hash::make($request->input('lname'));
        $addstaff->save();

        return redirect()->back()->with('success', 'Staff Added Successfully!');
    }


    public function editstaff($id){
        $users = User::find($id);
        return view('/admin/edit-profile', compact('users'));
    }

    public function edit(){
        return view('/admin/edit-profile')->with('users' . auth()->user());
    }

    public function update($id, Request $request){
        $user = User::findOrFail($id);


        $user->name = $request->input('name');
        $user->position = $request->input('position');
        $user->office = $request->input('office');
        $user->age = $request->input('age');
        $user->startdate = $request->input('startdate');
        $user->salary = $request->input('salary');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        $user->update($request->all());


        return redirect()->back()->with('success', 'User updated succesfully!');
    }

    public function trash($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
