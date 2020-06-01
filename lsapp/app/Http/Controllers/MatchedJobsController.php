<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppliedJob;
use App\MatchedJob;

class MatchedJobsController extends Controller
{
    //
    public function index(){
        $matched_jobs = MatchedJob::where('candidate_email',auth()->user()->email)->get();
        return view('matched_jobs.index')->with('matched_jobs',$matched_jobs);
    }

    public function create(Request $request,$id){
        $applied_job = AppliedJob::find($id);

        $matched_job = new MatchedJob;
        $matched_job->candidate_email = $applied_job->candidate_email;
        $matched_job->employer_email = auth()->user()->email;
        $matched_job->job_title = $applied_job->title;
        $matched_job->save();

        return redirect()->back()->with('success','The candidate has been informed!');
    }

    public function destroy(){
        return redirect()->back()->with('success','The candidate has been informed regarding the mismatch!');
    }
}
