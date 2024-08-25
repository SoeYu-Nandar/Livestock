<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class AdminMedicineController extends Controller
{
   public function create()
   {
        return view('admin.medicines.create');
   }
   public function show()
    {     
        $medicines = Medicine::latest()->paginate(6);
            // Check for low stock products
        $lowStockProducts = $medicines->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.medicines.show',compact('medicines', 'lowStockProducts'));
   }
   public function store(Request $request)
   {
     $formData = $request->validate([
          "name" => ["required"],
          "company_name" =>  ["required"],
          "animals" =>  ["required"],
          "methods" =>  ["required"],
          "diseases" =>  ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"],
      ]);
     
      $formData['image'] = $request->file('image')->store('thumbnails');
      Medicine::create($formData);

      return redirect('/admin/medicines/show');
   }
   public function edit(Medicine $id)
   {
       return view('admin.medicines.edit',[
           'medicine' => $id
       ]);
   }
   public function update(Request $request,$id)
   {
     $medicine = Medicine::find($id);
    $formData = $request->validate([
          "name" => ["required"],
          "company_name" =>  ["required"],
          "animals" =>  ["required"],
          "methods" =>  ["required"],
          "diseases" =>  ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"],
      ]);
     
      $formData['image'] = $request->file('thumbnail') ?
      $request->file('thumbnail')->store('thumbnails') : $medicine->image;
      $medicine->update($formData);
  return redirect('/admin/medicines/show');      
   }
   public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect('/admin/medicines/show')->with('danger', 'Selected medicine is deleted');
    }
}
