<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppliedJob;
use App\Job;
use App\Employer;

class AppliedJobsController extends Controller
{
    public function index(){
        $applied_jobs = AppliedJob::where('candidate_id',auth()->user()->id)->get();
        return view('applied_jobs.index')->with('applied_jobs',$applied_jobs);
    }

    public function create(Request $request,$id){
        $job = Job::find($id);
        return $job->employer;
        $employer_id = Employer::where('id',$job->employer->id)->first();

        $applied_job = new AppliedJob;
        $applied_job->candidate_id = auth()->user()->id;
        $applied_job->employer_id = $employer_id;
        $applied_job->job_title = $job->title;
        $applied_job->save();
        auth()->user()->applied=1;

        return redirect()->back()->with('success','You have successfully applied for this job!');
    }

    public function manage_candidates(){
        $jobs = AppliedJob::where('employer_id',auth()->user()->id)->get();
        return view('employers.manage_candidates')->with('jobs',$jobs);
    }
}
