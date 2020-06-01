<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\User;

class EmployersController extends Controller
{
    //
    public function edit(){
        $email = User::find($id)->email;
        $employer = Employer::where('email',$email)->first();
        return view('employers.edit')->with(['employer'=>$employer,'user_id'=>$id]);
    }
    
    public function update(Request $request){
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'nullable|string|max:10',
            'email'  => 'required|string',
            'bio' => 'nullable',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'company_name' => 'required|string',
            'company_image' => 'nullable|image|max:2048',
            'contact_desk' => 'nullable|string|max:10',
            'description' => 'required|string',
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
        $employer->phone_no = $request->input('phone_no');
        $employer->email = $request->input('email');
        $employer->bio = $request->input('bio');
        $employer->linkedin = $request->input('linkedin');
        $employer->facebook = $request->input('facebook');
        $employer->company_name = $request->input('company_name');
        $employer->city = $request->input('city');
        $employer->state = $request->input('state');
        $employer->country = $request->input('country');

        if($request->hasFile('image'))
            $employer->image = $fileNameToStore;

        $employer->save();

        if(Company::where('name',$request->input('company_name'))->count==0){
            
            if($request->hasFile('company_image')){
                $getFileNameWithExt = $request->file('company_image')->getClientOriginalName();
                $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
                $extension = $request->file('company_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/company_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

            $company = new Company;
            $company->name = $request->input('company_name');
            $company->image = $fileNameToStore;
            $company->phone_no = $request->input('contact_desk');
            $company->description = $request->input('description');
            $company->city = $request->input('city');
            $company->state = $request->input('state');
            $company->country = $request->input('country');
            $company->employer_name = auth()->user()->first_name;
            $company->save();
        }

        return redirect('/')->with("success","Your profile has been updated!");
    }
}
