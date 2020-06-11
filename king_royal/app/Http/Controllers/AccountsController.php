<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AccountsController extends Controller
{
    public function dashboard(){
        return view('accounts.dashboard');
    }


    public function new(){
        return view('accounts.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email'  => 'required|string|unique:candidates',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->role = 'accountant';
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with("success","A new accountant has been created!");
    }

    public function edit($id){
        $user = User::find($id);
        return view('accounts.edit')->with(['user'=>$user,'user_id'=>$id]);
    }

    public function show($id){
        $user = User::find($id);
        return view('accounts.show')->with('user',$user);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email'  => 'required|string|unique:candidates',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->save();

        return redirect()->back()->with("success","Your profile has been updated!");
    }

    public function destroy(Request $request,$id){
        $user = User::delete($id);
        return redirect()->back()->with('success','The account has been deleted!');
    }
}
