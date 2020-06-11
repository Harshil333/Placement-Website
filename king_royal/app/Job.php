<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    public $primaryKey = 'id';

    protected $fillable = [
        'title','type','description', 'vacancies',
        'city', 'state', 'country', 
        'employer_name', 'category_name', 'company_name',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
