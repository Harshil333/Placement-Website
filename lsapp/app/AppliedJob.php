<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    //
    protected $table = 'applied_jobs';

    protected $fillable = [
        'candidate_email','employer_email','job_title',
    ];
}
