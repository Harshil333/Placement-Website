<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $table = 'candidates';
    public $primaryKey = 'id';

    protected $fillable = [
        'email',
        'first_name', 'last_name',
        'phone_no', 'bio', 'linkedin', 'image',
        'qualification', 'qual_pdf', 'work_experience',
        'city', 'state', 'country',
    ];
}
