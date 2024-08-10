<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Cowfood;
use Illuminate\Http\Request;

class CowfoodController extends Controller
{
    public function index()
   {
    return view('food.cowfood-section',[
      'cowfoods' => Cowfood::latest()
                ->filter(request(['company','search']))
                ->paginate(6)
                ->withQueryString(),
      'companies' => Company::all(),
      'currentCompany' =>Company::firstWhere('slug',request('company')) 
    ]);
   }
   
   public function show(Cowfood $id)
   {
      return view('food.cowfood-show',[
         'cowfood'=>$id,
         'company'=>$id
      ]);
   }
}
