<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    // public function show()
    // {
    //     $payments = Payment::latest()->paginate(6);
    //     $user = User::all();
    //     $cart = Cart::all();
    //     return  $view = view('admin.payments.show', compact('payments','user','cart'));
    // }
    public function show()
{
    $payments = Payment::with(['user', 'cartItems'])->latest()->paginate(6);
    $cartItems = Cart::where('archived', true)->get(); // Or use more specific queries
    return view('admin.payments.show', compact('payments'));
}

   
    // where('user_id')->get();
    public function detail(Payment $id)
    {
        $payment = $id;
        $user = User::all();
       return view('admin.payments.detail',compact('payment','user'));
        
    }
}
