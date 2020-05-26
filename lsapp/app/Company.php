<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companies';
    public $primaryKey = 'id';

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
