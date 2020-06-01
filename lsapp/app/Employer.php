<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    //
    protected $table = 'employers';
    public $primaryKey = 'id';

    protected $fillable = [
        'email',
        'first_name', 'last_name',
        'phone_no', 'bio', 'linkedin', 'facebook', 'image', 'company_name',
        'city', 'state', 'country',
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
