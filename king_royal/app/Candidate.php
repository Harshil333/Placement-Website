<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    public $primaryKey = 'id';

    protected $fillable = [
        'id','first_name', 'last_name', 'email',
        'phone_no', 'bio', 'linkedin', 'image',
        'city', 'state', 'country',
    ];
}
