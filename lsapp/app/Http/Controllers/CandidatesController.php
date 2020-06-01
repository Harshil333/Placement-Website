<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;

class CandidatesController extends Controller
{
    //
    public function index(){
        $candidates = Candidate::all();
        return view('candidates.index')->with('candidates',$candidates);
    }

    public function edit($id){
        $email = User::find($id)->email;
        $candidate = Candidate::where('email',$email)->first();
        // return $candidate;
        $data = ['candidate'=>$candidate,'user_id'=>$id];
        return view('candidates.edit')->with(['candidate'=>$candidate,'user_id'=>$id]);
    }
    
    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'nullable|string|max:10',
            'email'  => 'required|string',
            'bio' => 'nullable',
            'linkedin' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'qualification' => 'nullable|string',
            'qual_pdf' => 'nullable|file|max:2048',
            'work_experience' => 'nullable|file|max:2048',
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

        if($request->hasFile('qual_pdf')){
            $getFileNameWithExt = $request->file('qual_pdf')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('qual_pdf')->getClientOriginalExtension();
            $fileNameToStore2 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('qual_pdf')->storeAs('public/candidate_qualification',$fileNameToStore2);
        }
        if($request->hasFile('work_experience')){
            $getFileNameWithExt = $request->file('work_experience')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('work_experience')->getClientOriginalExtension();
            $fileNameToStore3 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('work_experience')->storeAs('public/candidate_work_experience',$fileNameToStore3);
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
        if($request->hasFile('qual_pdf'))
            $candidate->image = $fileNameToStore2;
        if($request->hasFile('work_experience'))
            $candidate->image = $fileNameToStore3;

        $candidate->save();

        return redirect('/')->with("success","Your profile has been updated!");
    }
}
