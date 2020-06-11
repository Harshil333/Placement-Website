<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    public function index(){
        $companies=Company::all();
        return view('companies.index')->with('companies',$companies);
    }

    public function new(){
        return view('companies.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'phone_no' => 'required|min:10|max:10',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);
        
        if($request->hasFile('image')){
            $getFileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($getFileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/company_images',$fileNameToStore1);
        }

        $company = new Company;
        $company->name = $request->input('name');
        $company->phone_no = $request->input('phone_no');
        $company->description = $request->input('description');
        if($request->hasFile('image'))
            $company->image = $fileNameToStore1;
        $company->city = $request->input('city');
        $company->state = $request->input('state');
        $company->country = $request->input('country');
        $company->save();

        return redirect()->back()->with('success','A new company has been created!');
    }

    public function show($id){
        $company = Company::find($id);
        $jobs = $company->jobs;
        return view('companies.show')->with(['company'=>$company,'jobs'=>$jobs]);
    }
}
