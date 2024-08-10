<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Duckfood;
use Illuminate\Http\Request;

class DfoodController extends Controller
{
    public function index()
   {
    return view('food.dfood-section',[
      'duckfoods' => Duckfood::latest()
                ->filter(request(['company','search']))
                ->paginate(6)
                ->withQueryString(),
      'companies' => Company::all(),
      'currentCompany' =>Company::firstWhere('slug',request('company')) 
    ]);
   }
   
   public function show(Duckfood $id)
   {
      return view('food.dfood-show',[
         'duckfood' => $id,
         'company' =>$id
      ]);
   }
}
