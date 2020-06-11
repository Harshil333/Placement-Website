<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;
use Illuminate\Support\Facades\Hash;

class CandidatesController extends Controller
{
    public function index(){
        $candidates = Candidate::all();
        return view('candidates.index')->with('candidates',$candidates);
    }

    public function new(){
        return view('candidates.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'nullable|string|min:10|max:10',
            'email'  => 'required|string|unique:candidates',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|string',
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
            $fileNameToStore1 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/candidate_images',$fileNameToStore1);
        }
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $candidate = new Candidate;
        $candidate->id = $user->id;
        

        $candidate->first_name = $request->input('first_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->phone_no = $request->input('phone_no');
        $candidate->email = $request->input('email');
        $candidate->bio = $request->input('bio');
        $candidate->linkedin = $request->input('linkedin');
        $candidate->city = $request->input('city');
        $candidate->state = $request->input('state');
        $candidate->country = $request->input('country');
        $candidate->qualification = $request->input('qualification');
        if($request->hasFile('image'))
            $candidate->image = $fileNameToStore1;

        $candidate->save();

        return redirect('/')->with("success","A new candidate has been created!");   
    }

    public function edit($id){
        $candidate = Candidate::where('id',auth()->user()->id)->first();
        // return $candidate;
        $data = ['candidate'=>$candidate,'user_id'=>$id];
        return view('candidates.edit')->with(['candidate'=>$candidate,'user_id'=>$id]);
    }
    
    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'nullable|string|min:10|max:10',
            'email'  => 'required|string|unique:candidates',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);

        if($request->hasFile('image')){
            $getFileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/candidate_images',$fileNameToStore1);
        }
        
        $user = User::find($id);
        $candidate = Candidate::where('email',$user->email)->first();

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->save();
        

        $candidate->first_name = $request->input('first_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->phone_no = $request->input('phone_no');
        $candidate->email = $request->input('email');
        $candidate->bio = $request->input('bio');
        $candidate->linkedin = $request->input('linkedin');
        $candidate->city = $request->input('city');
        $candidate->state = $request->input('state');
        $candidate->country = $request->input('country');
        $candidate->qualification = $request->input('qualification');
        if($request->hasFile('image'))
            $candidate->image = $fileNameToStore1;

        $candidate->save();

        return redirect('/')->with("success","Your profile has been updated!");
    }

    // public function show($id){
    //     $candidate = Candidate::where('id',auth()->user()->id)->first();
    //     // return $candidate;
    //     $data = ['candidate'=>$candidate,'user_id'=>$id];
    //     return view('candidates.edit')->with(['candidate'=>$candidate,'user_id'=>$id]);
    // }

    public function destroy(Request $request,$id){
        User::delete($id);
        Candidate::delete($id);
        return redirect()->back()->with('success','The candidate\'s records have been deleted!');
    }
}
