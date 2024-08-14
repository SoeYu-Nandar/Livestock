<?php

namespace App\Http\Controllers;

use id;
use App\Models\Faq;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use App\Models\Blogchicken;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    
    public function index()
    {
        return view('admin.blogs.index',[
            'blogs' => Blogchicken::count(),
            'user' => User::where('is_admin','0')->count(),
            'admin' => User::where('is_admin','1')->count(),
            'faq' => Faq::count(),
            'users' => User::where('is_admin','0')->latest()->paginate(6)
        ]);
    }
    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all(),
            'types' =>      Type::all()
        ]);
    }
    public function store(Request $request)
    {
        if(Auth::check()){
        $formData = $request->validate([
            "title" => ["required"],
            "slug" =>  ["required", Rule::unique('blogchickens', 'slug')],
            "intro" =>  ["required"],
            "body" =>  ["required"],
            "category_id" =>  ["required", Rule::exists('categories', 'id')],
            "type_id" =>  ["required", Rule::exists('types', 'id')]
        ]);
        $formData['user_id'] = Auth::id();
        $formData['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
    }else{
        return redirect('/login');
    }
        Blogchicken::create($formData);

        return redirect('/admin/blogs/show');
    }
    public function show()
    {
        return view('admin.blogs.show',[
            'blogchickens' => Blogchicken::latest()->paginate(6)
        ]);
    }
    public function edit(Blogchicken $blogchicken)
    {
    
        return view('admin.blogs.edit', [
            'blogchicken' => $blogchicken,
            'categories' => Category::all(),
            'types' =>      Type::all()
        ]);
    }
    public function update(Request $request,Blogchicken $blogchicken)
    {
        
        $formData = $request->validate([
            "title" => ["required"],
            "slug" =>  ["required", Rule::unique('blogchickens', 'slug')->ignore($blogchicken->id)],
            "intro" =>  ["required"],
            "body" =>  ["required"],
            "category_id" =>  ["required", Rule::exists('categories', 'id')],
            "type_id" =>  ["required", Rule::exists('types', 'id')]
        ]);
        $formData['user_id'] = Auth::id();
        $formData['thumbnail'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $blogchicken->thumbnail;
        $blogchicken->update($formData);

        return redirect('/blogs');
    }
    public function destroy(Blogchicken $blogchicken)
    {
        $blogchicken->delete();
        return redirect('/admin/blogs/show')->with('danger', 'Blog is deleted');
    }

    public function reply()
    {
        return view('admin.faq-reply');
    }

}
