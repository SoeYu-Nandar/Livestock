<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pigfood;
use Illuminate\Http\Request;

class PfoodController extends Controller
{
    public function index()
    {
     return view('food.pfood-section',[
      'pigfoods' => Pigfood::latest()
                ->filter(request(['company','search']))
                ->paginate(6)
                ->withQueryString(),
      'companies' => Company::all(),
      'currentCompany' =>Company::firstWhere('slug',request('company')) 
     ]);
    }
    public function show(Pigfood $id)
   {
      return view('food.pfood-show',[
         'pigfood' => $id,
         'company' =>$id
      ]);
   }
}
