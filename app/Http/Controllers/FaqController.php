<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    public function faq_index()
    {
        return view('faqs.faq_show',[
            'faqs' => Faq::all()
        ]);
    }
    public function faq_store(Request $request)
    {
        $formData = $request->validate([
            "name" => ['required','max:255', 'min:3'],
            "question" =>  ['required','max:255', 'min:3'],
            
        ]);
        Faq::create($formData);
        return redirect('/')->with('success', 'Your message is sent to admin');
    }
}
