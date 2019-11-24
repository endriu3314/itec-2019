<?php

namespace App\Http\Controllers;

use App\Handlers\ErrorHandler;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.index');
    }

    public function store(){
        $payment = new Payment();

        $payment->user_id = request('user_id');
        $payment->amount = request('amount');
        $payment->products = request('products');
        $payment->card_number = Hash::make(request('card-number'));
        $payment->card_ccv = Hash::make(request('card-ccv'));

        $payment->save();

        Session::flush();

        return redirect()->back()->with('succes');
    }

    public function userPayments(Request $request){
        $res = null;

        try {
            $res = Payment::where('user_id', $request->id)->get()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return $res;
    }
}
