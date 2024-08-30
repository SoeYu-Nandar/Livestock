<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function show()
    {
        $payments = Payment::latest()->paginate(6);
        $user = User::all();
        return  $view = view('admin.payments.show', compact('payments','user'));
    }
    public function detail(Payment $id)
    {
        $payment = $id;
        $user = User::all();
       return view('admin.payments.detail',compact('payment','user'));
        
    }
}
