<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Fishfood;
use Illuminate\Http\Request;

class FishfoodController extends Controller
{
    public function index()
    {
     return view('food.fishfood-section',[
        'fishfoods' => Fishfood::latest()
                ->filter(request(['company','search']))
                ->paginate(6)
                ->withQueryString(),
         'companies' => Company::all(),
         'currentCompany' =>Company::firstWhere('slug',request('company')) 
     ]);
    }
    
    public function show(Fishfood $id)
    {
       return view('food.fishfood-show',[
        'fishfood' =>$id,
        'company' =>$id
       ]);
    }
}
