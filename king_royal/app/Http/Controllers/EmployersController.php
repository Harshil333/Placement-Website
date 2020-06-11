<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Employer;

class EmployersController extends Controller
{
    public function new(){
        return view('employers.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'phone_no' => 'required|string|min:10|max:10',
            'email'  => 'required|string',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($request->hasFile('image')){
            $getFileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/employer_images',$fileNameToStore);
        }
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->role = 'employer';
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $employer = new Employer;
        $employer->id = $user->id;

        $employer->first_name = $request->input('first_name');
        $employer->last_name = $request->input('last_name');
        $employer->company_name = $request->input('company_name');
        $employer->phone_no = $request->input('phone_no');
        $employer->email = $request->input('email');
        
        if($request->hasFile('image'))
            $employer->image = $fileNameToStore;

        $employer->bio = $request->input('bio');
        $employer->linkedin = $request->input('linkedin');
        $employer->facebook = $request->input('facebook');
        $employer->city = $request->input('city');
        $employer->state = $request->input('state');
        $employer->country = $request->input('country');


        $employer->save();

        return redirect()->back()->with("success","A new employer has been created!");
    }

    public function edit($id){
        $email = User::find($id)->email;
        $employer = Employer::where('email',$email)->first();
        return view('employers.edit')->with(['employer'=>$employer,'user_id'=>$id]);
    }
    
    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'phone_no' => 'required|string|min:10|max:10',
            'email'  => 'required|string',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);

        if($request->hasFile('image')){
            $getFileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/employer_images',$fileNameToStore);
        }
        
        $user = User::find($id);
        $employer = Employer::where('email',$user->email)->first();


        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->save();


        $employer->first_name = $request->input('first_name');
        $employer->last_name = $request->input('last_name');
        $employer->company_name = $request->input('company_name');
        $employer->phone_no = $request->input('phone_no');
        $employer->email = $request->input('email');
        
        if($request->hasFile('image'))
            $employer->image = $fileNameToStore;

        $employer->bio = $request->input('bio');
        $employer->linkedin = $request->input('linkedin');
        $employer->facebook = $request->input('facebook');
        $employer->city = $request->input('city');
        $employer->state = $request->input('state');
        $employer->country = $request->input('country');


        $employer->save();

        return redirect()->back()->with("success","Your profile has been updated!");
    }

    public function destroy(Request $request,$id){
        User::delete($id);
        Employer::delete($id);
        return redirect()->back()->with('success','The employer\'s records have been deleted!');
    }
}
