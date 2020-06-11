<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $primaryKey = 'id';

    protected $fillable = [
        'payment_for','payment_mode', 
        'payment_status', 'user_email', 'amount',
    ];
}
