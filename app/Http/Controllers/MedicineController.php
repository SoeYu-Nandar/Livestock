<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine',[
            'medicines' => Medicine::latest()
            ->filter(request(['search']))
            ->paginate(6)
            ->withQueryString(),
        ]);    
        }
}
