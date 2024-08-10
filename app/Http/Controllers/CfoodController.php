<?php

namespace App\Http\Controllers;


use App\Models\Type;
use App\Models\Company;
use App\Models\Chickenfood;
use Illuminate\Http\Request;

class CfoodController extends Controller
{
   public function index()
   {
    return view('food.cfood-section',[
      'chickenfoods' => Chickenfood::latest()
                ->filter(request(['company','search']))
                ->paginate(6)
                ->withQueryString(),
      'companies' => Company::all(),
      'currentCompany' =>Company::firstWhere('slug',request('company')) 
    ]);
   }
   
   public function show(Chickenfood $id)
   {
      return view('food.cfood-show',[
         'chickenfood' =>$id,
         'company'=>$id

      ]);
         
   }
   
}
