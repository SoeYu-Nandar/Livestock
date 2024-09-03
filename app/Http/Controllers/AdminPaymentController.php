<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function show()
{
    $payments = Payment::with('purchases', 'user')->get();
    $purchases = Purchase::where('payment_id')->latest()->paginate(6);
    $cartItems = Cart::where('archived', true)->get(); // Or use more specific queries
    return view('admin.payments.show', compact('payments','purchases'));
}


    public function detail(Payment $id)
    {
        $payment = $id;
        $payments = Payment::with(['user', 'cartItems'])->latest()->paginate(6);
        $purchases = Purchase::all();
        $cart = Cart::all();
       return view('admin.payments.detail',compact('payment','cart','purchases'));
        
    }
}
