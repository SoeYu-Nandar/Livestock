<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AdminfaqController extends Controller
{
    public function faq_index()
    {
        return view('admin.faqs.faq_show',[
            'faqs' => Faq::latest()->paginate(6)
        ]);
    }
    public function faq_reply(Faq $id)
    {
        return view('admin.faqs.faq_reply',[
            'faq' => $id
        ]);
    }
    public function faq_update(Request $request,$id)
    {
        
        $faq = Faq::findOrFail($id);
        $formData = $request->validate([
            "answer" =>  ["required"]          
        ]);
       
        $faq->update([
            'answer' => $formData['answer'],
        ]); 
        
        return redirect('/admin/faq')->with('success','Your answer is sent to user');
    }
}
