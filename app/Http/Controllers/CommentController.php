<?php

namespace App\Http\Controllers;
use App\Models\Blogchicken;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,Blogchicken $blogchicken)
    {
        $request->validate([
            'body' => 'required | min:10'
        ]);
        //comment store
        $blogchicken->comment()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return redirect('/blogs/' . $blogchicken->slug);
    }
}
