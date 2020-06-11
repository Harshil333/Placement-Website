<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchedJob extends Model
{
    protected $table = 'matched_jobs';

    protected $fillable = [
        'candidate_id','employer_id','job_title',
    ];
}
