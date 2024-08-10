<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //validation
        $formData = $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create($formData);
        
        //login
        auth()->login($user);

        return redirect('/')->with('success', 'မင်္ဂလာပါ ' . $user->name);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function post_login(Request $request)
    {
        //validation
        $formData= $request->validate([
            'email' =>['required','email','max:255',Rule::exists('users', 'email')],
            'password'=>['required','min:8','max:255'],
        ]);
        
        //test user credentials
        if (auth()->attempt($formData)) {
            if(auth()->user()->is_admin){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/')->with('success', 'ကြိုဆိုပါတယ်');
            }
        } else {
            //if user credentials fail -> redirect back to form with error
            return redirect()->back()->withErrors([
                'email'=>'User Credentials Wrong'
            ]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'နှုတ်ဆက်ပါတယ်');
    }
}
