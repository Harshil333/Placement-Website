<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailsController extends Controller
{
    //
    public function send(){
        Mail::to('harshil@weswitched.studio')->send(new SendMail());
        return back();
    }
}
