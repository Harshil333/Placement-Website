<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model
{
    protected $table = 'user_docs';

    protected $fillable = [
        'candidate_email','dcoument','verified',
    ];
}
