<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blogchicken;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index');
    }
    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request)
    {
        $formData = $request->validate([
            "title" => ["required"],
            "slug" =>  ["required", Rule::unique('blogchickens', 'slug')],
            "intro" =>  ["required"],
            "body" =>  ["required"],
            "category_id" =>  ["required", Rule::exists('categories', 'id')]
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        Blogchicken::create($formData);

        return redirect('/');
    }
}
