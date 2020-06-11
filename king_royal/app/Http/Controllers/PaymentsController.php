<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentsController extends Controller
{
    public function new(){
        return view('payments.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'user_email'=>'required|email',
            'payment_for'=>'required|string',
            'amount'=>'required',
            'payment_status'=>'required|string',
            'payment_mode' => 'required|string',
        ]);
        $payment = new Payment;
        $payment->user_email = $request->input('user_email');
        $payment->amount = $request->input('amount');
        $payment->payment_for = $request->input('payment_for');
        $payment->payment_mode = $request->input('payment_mode');
        if($request->input('payment_status')=='Pending')
            $payment->payment_status = 0;
        else
            $payment->payment_status = 1;
        $payment->save(); 
        return redirect()->back()->with('success','Payment successfully created!');
    }

    public function pending(){
        $payments = Payment::where('payment_status',0)->get();
        return view('payments.index')->with('payments',$payments);
    }

    public function confirmed(){
        $payments = Payment::where('payment_status',1)->get();
        return view('payments.index')->with('payments',$payments);
    }

    public function confirm_payment(Request $request,$id){
        $payment = Payment::find($id);
        $payment->payment_status = 1;
        $payment->save();

        return redirect()->back()->with('success','payment successfully confirmed');
    }
}
