<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppliedJob;
use App\MatchedJob;

class MatchedJobsController extends Controller
{
    public function index(){
        $matched_jobs = MatchedJob::where('candidate_id',auth()->user()->id)->get();
        return view('matched_jobs.index')->with('matched_jobs',$matched_jobs);
    }

    public function create(Request $request,$id){
        $applied_job = AppliedJob::find($id);

        $matched_job = new MatchedJob;
        $matched_job->candidate_id = $applied_job->candidate_id;
        $matched_job->employer_id = auth()->user()->id;
        $matched_job->job_title = $applied_job->title;
        $matched_job->save();

        return redirect()->back()->with('success','The candidate has been informed regarding the match!');
    }

    public function destroy(Request $request,$id){
        $applied_job = AppliedJob::find($id);
        $user = User::find($applied_job->candidate_id);
        $user->applied = 0;
        $user->save();
        AppliedJob::delete($id);
        return redirect()->back()->with('success','The candidate has been informed regarding the mismatch!');
    }
}
