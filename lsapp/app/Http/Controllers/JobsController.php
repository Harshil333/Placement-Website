<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    //
    public function localjobs(){
        $jobs = Job::where('country',auth()->user()->country)->get();
        return view('jobs.index')->with('jobs',$jobs);
    }

    public function overseasjobs(){
        $jobs = Job::where('country','!=',auth()->user()->country)->get();
        return view('jobs.index')->with('jobs',$jobs);
    }

    public function manage_jobs(){
        $jobs = Job::where('employer',auth()->user()->first_name.' '.auth()->user()->last_name)->get();
        return view('employers.manage_jobs')->with('jobs',$jobs);
    }

    public function filteredjobs(Request $request){
        $jobs=array();
        if($request->input('search')=='company')
            $jobs = Job::where('company_name','like', '%'.$request->input('queryString').'%')->get();
        elseif($request->input('search')=='category')
            $jobs = Job::where('category_name','like', '%'.$request->input('queryString').'%')->get();
        else
            $jobs = Job::where('city','like', '%'.$request->input('queryString').'%')->get();
        return view('jobs.index')->with('jobs',$jobs);   
    }

    public function new(){
        return view('jobs.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'type'  => 'required|max:10',
            'description' => 'required',
            'vacancies' => 'required|numeric',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'company_name' => 'required|string'
        ]);

        $job = new Job;
        $job->title = $request->input('title');
        $job->type = $request->input('type');
        $job->description = $request->input('description');
        $job->vacancies = $request->input('vacancies');
        $job->city = $request->input('city');
        $job->state = $request->input('state');
        $job->country = $request->input('country');
        $job->employer = auth()->user()->first_name.' '.auth()->user()->last_name;
        $job->company_name = $request->input('company_name');
        $job->save();

        return redirect('/')->with('success','A new Job has been created!');
    }

    public function show($id){
        $job = Job::find($id);
        return view('jobs.show')->with('job',$job);
    }
    public function edit($id){
        $job = Job::find($id);
        return view('jobs.edit')->with('job',$job);
    }

    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'type'  => 'required|max:10',
            'description' => 'required',
            'vacancies' => 'required|numeric',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);

        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->type = $request->input('type');
        $job->description = $request->input('description');
        $job->vacancies = $request->input('vacancies');
        $job->city = $request->input('city');
        $job->state = $request->input('state');
        $job->country = $request->input('country');
        $job->employer = auth()->user()->first_name.' '.auth()->user()->last_name;
        $job->company_name = $request->input('company_name');
        $job->save();

        return redirect('/')->with('success','The Job has been updated!');
    }

    public function delete(Request $request,$id){
        $job = Job::delete($id);
        return redirect()->back()->with('success','The job has been deleted!');
    }
}
