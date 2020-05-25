<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    //
    protected $table = 'companies';
    public $primaryKey = 'id';

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
