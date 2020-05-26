<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
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
