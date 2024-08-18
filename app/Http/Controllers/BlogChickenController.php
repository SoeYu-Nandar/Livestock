<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Blogchicken;
use Illuminate\Http\Request;


class BlogChickenController extends Controller
{
    public function index()
    {
        return view('blogs.chicken-section',[
            'blogchickens' => Blogchicken::latest()
                ->filter(request(['category', 'type']))
                ->paginate(9)
                ->withQueryString()               
        ]);

    }
    public function show(Blogchicken $blogchicken)
    {
        return view('blogs.chicken-show', [
            'blogchicken' => $blogchicken,
            'randomBlogs' => Blogchicken::inRandomOrder()->take(3)->get()
        ]);
    }
}
