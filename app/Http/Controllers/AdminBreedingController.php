<?php

namespace App\Http\Controllers;

use App\Models\Pigbreeding;
use App\Models\Fishbreeding;
use Illuminate\Http\Request;
use App\Models\Chickenbreeding;

class AdminBreedingController extends Controller
{
    public function chicken_create()
   {
        return view('admin.breedings.chicken_create');
   }

   public function chicken_show()
   {
    $chickenbreedings = Chickenbreeding::latest()->paginate(6);
        // Check for low stock products
    $lowStockProducts = $chickenbreedings->filter(function ($product) {
        return $product->quantity < 3;
    });
    return view('admin.breedings.chicken_show',compact('chickenbreedings', 'lowStockProducts'));
   }

   public function chicken_store(Request $request)
   {
     $formData = $request->validate([
          "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
      $formData['image'] = $request->file('image')->store('thumbnails');
      Chickenbreeding::create($formData);

      return redirect('/admin/breedings/chicken_breeding/show');
   }

   public function chicken_edit(Chickenbreeding $id)
    {
        return view('admin.breedings.chicken_edit',[
            'chickenbreeding' => $id
        ]);
    }

    public function chicken_update(Request $request,$id)
    {
        
     $chickenbreeding = Chickenbreeding::find($id);
     $formData = $request->validate([
          "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
     $formData['image'] = $request->file('image') ?
            $request->file('image')->store('thumbnails') : $chickenbreeding->image;
        $chickenbreeding->update($formData);
        return redirect('/admin/breedings/chicken_breeding/show');
    }

    public function chicken_destroy($id)
    {
        $chickenbreeding = Chickenbreeding::find($id);
        $chickenbreeding->delete();
        return redirect('/admin/breedings/chicken_breeding/show')->with('danger', 'The selected data is deleted');
    }
    //pig 
   public function pig_create()
   {
        return view('admin.breedings.pig_create');
   }

   public function pig_show()
   {
        $pigbreedings = Pigbreeding::latest()->paginate(6);
            // Check for low stock products
        $lowStockProducts = $pigbreedings->filter(function ($product) {
            return $product->quantity < 3;
        });
        return view('admin.breedings.pig_show',compact('pigbreedings', 'lowStockProducts'));
   }

   public function pig_store(Request $request)
   {
     $formData = $request->validate([
          "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
      $formData['image'] = $request->file('image')->store('thumbnails');
      Pigbreeding::create($formData);

      return redirect('/admin/breedings/pig_breeding/show');
   }

   public function pig_edit(Pigbreeding $id)
    {
        return view('admin.breedings.pig_edit',[
            'pigbreeding' => $id
        ]);
    }

    public function pig_update(Request $request,$id)
    {
     $pigbreeding = Pigbreeding::find($id);
     $formData = $request->validate([
          "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
     $formData['image'] = $request->file('image') ?
            $request->file('image')->store('thumbnails') : $pigbreeding->image;
        $pigbreeding->update($formData);
        return redirect('/admin/breedings/pig_breeding/show');
    }

    public function pig_destroy($id)
    {
        $pigbreeding = Pigbreeding::find($id);
        $pigbreeding->delete();
        return redirect('/admin/breedings/pig_breeding/show')->with('danger', 'The selected data is deleted');
    }
    //fish
   public function fish_create()
   {
        return view('admin.breedings.fish_create');
   }

   public function fish_show()
   {
        $fishbreedings = Fishbreeding::latest()->paginate(6);
            // Check for low stock products
        $lowStockProducts = $fishbreedings->filter(function ($product) {
            return $product->quantity < 3;
    });
    return view('admin.breedings.fish_show',compact('fishbreedings', 'lowStockProducts'));
   }

   public function fish_store(Request $request)
   {
     $formData = $request->validate([
            "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
      $formData['image'] = $request->file('image')->store('thumbnails');
      Fishbreeding::create($formData);

      return redirect('/admin/breedings/fish_breeding/show');
   }

   public function fish_edit(Fishbreeding $id)
    {
        return view('admin.breedings.fish_edit',[
            'fishbreeding' => $id
        ]);
    }

    public function fish_update(Request $request,$id)
    {
     $fishbreeding = Fishbreeding::find($id);
     $formData = $request->validate([
            "name" => ["required"],
          "description" => ["required"],
          "price" =>  ["required"],
          "quantity" =>  ["required"]
     ]);
     $formData['image'] = $request->file('image') ?
            $request->file('image')->store('thumbnails') : $fishbreeding->image;
        $fishbreeding->update($formData);
        return redirect('/admin/breedings/fish_breeding/show');
    }
    
    public function fish_destroy($id)
    {
        $fishbreeding = Fishbreeding::find($id);
        $fishbreeding->delete();
        return redirect('/admin/breedings/fish_breeding/show')->with('danger', 'The selected data is deleted');
    }
}
