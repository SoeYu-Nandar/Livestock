<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function show()
    {
       
        $payments = Payment::latest()->paginate(6);
        return  $view = view('admin.payments.show', compact('payments'));
    }
    
}
