<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    protected $table = 'jobs';
    public $primaryKey = 'id';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
