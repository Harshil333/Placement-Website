<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Candidate;
use App\Employer;
use App\Category;
use App\Company;

class ReceptionistController extends Controller
{
    public function dashboard(){
        $user_count = User::all()->count();
        $candidate_count = Candidate::all()->count();
        $employer_count = Employer::all()->count();
        $category_count = Category::all()->count();
        $company_count = Company::all()->count();        
        return view('reception.dashboard')->with(['user_count'=>$user_count,'candidate_count'=>$candidate_count,'employer_count'=>$employer_count,'category_count'=>$category_count,'company_count'=>$company_count]);
    }

    public function new(){
        return view('reception.new');
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
        $user->role = 'receptionist';
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with("success","A new receptionist has been created!");
    }

    public function edit($id){
        $user = User::find($id);
        return view('reception.edit')->with(['user'=>$user,'user_id'=>$id]);
    }

    public function show($id){
        $user = User::find($id);
        return view('reception.show')->with(['user'=>$user,'user_id'=>$id]);
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
