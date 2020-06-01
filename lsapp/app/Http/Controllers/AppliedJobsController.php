<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\AppliedJob;
use App\Employer;

class AppliedJobsController extends Controller
{
    //
    public function index(){
        $applied_jobs = AppliedJob::where('candidate_email',auth()->user()->email)->get();
        return view('applied_jobs.index')->with('applied_jobs',$applied_jobs);
    }

    public function create(Request $request,$id){
        $job = Job::find($id);
        $employer_email = Employer::where('email',$job->employer->email)->first();

        $applied_job = new AppliedJob;
        $applied_job->candidate_email = auth()->user()->email;
        $applied_job->employer_email = $employer_email;
        $applied_job->job_title = $job->title;
        $applied_job->save();

        return redirect()->back()->with('success','You have successfully applied for this job!');
    }

    public function manage_candidates(){
        $jobs = AppliedJob::where('employer_email',auth()->user()->email)->get();
        return view('employers.manage_candidates')->with('jobs',$jobs);
    }
}
