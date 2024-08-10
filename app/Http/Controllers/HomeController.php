<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        return view('index',compact('count'));
    }
}
