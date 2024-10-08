<?php

namespace App\Http\Controllers;

use App\Models\Pigbreeding;
use App\Models\Fishbreeding;
use Illuminate\Http\Request;
use App\Models\Chickenbreeding;

class BreedingController extends Controller
{
    public function chicken_index()
    {
       return view('breedings.cbreeding-section',[
         'cbreedings' => Chickenbreeding::latest()
         ->filter(request(['search']))
         ->paginate(6)
         ->withQueryString(),
       ]);
    }
    public function pig_index()
    {
       return view('breedings.pbreeding-section',[
         'pbreedings' => Pigbreeding::latest()
         ->filter(request(['search']))
         ->paginate(6)
         ->withQueryString(),
       ]);
    }
    public function fish_index()
    {
       return view('breedings.fbreeding-section',[
         'fbreedings' => Fishbreeding::latest()
         ->filter(request(['search']))
         ->paginate(6)
         ->withQueryString(),
       ]);
    }
}
