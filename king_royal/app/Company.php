<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    public $primaryKey = 'id';

    protected $fillable = [
        'name', 'phone_no', 'image',
        'description', 'city', 'state', 'country',
    ];

    public function jobs(){
        return $this->hasMany('App\Job');
    }

    public function employers(){
        return $this->hasMany('App\Employer');
    }
}
