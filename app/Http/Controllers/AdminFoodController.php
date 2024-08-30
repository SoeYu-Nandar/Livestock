<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Cowfood;
use App\Models\Pigfood;
use App\Models\Duckfood;
use App\Models\Fishfood;
use App\Models\Chickenfood;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminFoodController extends Controller
{
    public function chicken_create()
    {
        return view('admin.foods.chicken_create', [
            'companies' => Company::all()
        ]);
    }
    public function chicken_show()
    {
        $chickenfoods = Chickenfood::latest()->paginate(6);
        // Check for low stock products
        $lowStockProducts = $chickenfoods->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.foods.chicken_show', compact('chickenfoods', 'lowStockProducts'));
    }
    public function chicken_store(Request $request)
    {
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('image')->store('thumbnails');
        Chickenfood::create($formData);

        return redirect('/admin/foods/chicken_food/show');
    }
    public function chicken_edit(Chickenfood $id)
    {
        return view('admin.foods.chicken_edit', [
            'chickenfood' => $id,
            'companies' => Company::all()
        ]);
    }
    public function chicken_update(Request $request, $id)
    {

        $chickenfood = Chickenfood::find($id);
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $chickenfood->image;
        $chickenfood->update($formData);
        return redirect('/admin/foods/chicken_food/show');
    }
    public function chicken_destroy($id)
    {
        $chickenfood = Chickenfood::find($id);
        $chickenfood->delete();
        return redirect('/admin/foods/chicken_food/show')->with('danger', 'Chicken livestock food is deleted');
    }
    // pig
    public function pig_create()
    {
        return view('admin.foods.pig_create', [
            'companies' => Company::all()
        ]);
    }
    public function pig_show()
    {
        $pigfoods = Pigfood::latest()->paginate(6);
        // Check for low stock products
        $lowStockProducts = $pigfoods->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.foods.pig_show', compact('pigfoods', 'lowStockProducts'));;
    }
    public function pig_store(Request $request)
    {
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('image')->store('thumbnails');
        Pigfood::create($formData);

        return redirect('/admin/foods/pig_food/show');
    }
    public function pig_edit(Pigfood $id)
    {
        return view('admin.foods.pig_edit', [
            'pigfood' => $id,
            'companies' => Company::all()
        ]);
    }
    public function pig_update(Request $request, $id)
    {

        $pigfood = Pigfood::find($id);
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $pigfood->image;
        $pigfood->update($formData);
        return redirect('/admin/foods/pig_food/show');
    }
    public function pig_destroy($id)
    {
        $pigfood = Pigfood::find($id);
        $pigfood->delete();
        return redirect('/admin/foods/pig_food/show')->with('danger', 'Pig livestock food is deleted');
    }
    //duck
    public function duck_create()
    {
        return view('admin.foods.duck_create', [
            'companies' => Company::all()
        ]);
    }
    public function duck_show()
    {
        $duckfoods = Duckfood::latest()->paginate(6);
        // Check for low stock products
        $lowStockProducts = $duckfoods->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.foods.duck_show', compact('duckfoods', 'lowStockProducts'));;
    }
    public function duck_store(Request $request)
    {
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('image')->store('thumbnails');
        Duckfood::create($formData);

        return redirect('/admin/foods/duck_food/show');
    }
    public function duck_edit(Duckfood $id)
    {
        return view('admin.foods.duck_edit', [
            'duckfood' => $id,
            'companies' => Company::all()
        ]);
    }
    public function duck_update(Request $request, $id)
    {
        $duckfood = Duckfood::find($id);
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $duckfood->image;
        $duckfood->update($formData);
        return redirect('/admin/foods/duck_food/show');
    }
    public function duck_destroy($id)
    {
        $duckfood = Duckfood::find($id);
        $duckfood->delete();
        return redirect('/admin/foods/duck_food/show')->with('danger', 'Duck livestock food is deleted');
    }
    //cow
    public function cow_create()
    {
        return view('admin.foods.cow_create', [
            'companies' => Company::all()
        ]);
    }
    public function cow_show()
    {
        $cowfoods = Cowfood::latest()->paginate(6);
        // Check for low stock products
        $lowStockProducts = $cowfoods->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.foods.cow_show', compact('cowfoods', 'lowStockProducts'));;
    }
    public function cow_store(Request $request)
    {
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('image')->store('thumbnails');
        Cowfood::create($formData);

        return redirect('/admin/foods/cow_food/show');
    }
    public function cow_edit(Cowfood $id)
    {
        return view('admin.foods.cow_edit', [
            'cowfood' => $id,
            'companies' => Company::all()
        ]);
    }
    public function cow_update(Request $request, $id)
    {

        $cowfood = Cowfood::find($id);
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $cowfood->image;
        $cowfood->update($formData);
        return redirect('/admin/foods/cow_food/show');
    }
    public function cow_destroy($id)
    {
        $cowfood = Cowfood::find($id);
        $cowfood->delete();
        return redirect('/admin/foods/cow_food/show')->with('danger', 'Cow livestock food is deleted');
    }
    public function fish_create()
    {
        return view('admin.foods.fish_create', [
            'companies' => Company::all()
        ]);
    }
    public function fish_show()
    {
        $fishfoods = Fishfood::latest()->paginate(6);
        // Check for low stock products
        $lowStockProducts = $fishfoods->filter(function ($product) {
            return $product->quantity < 6;
        });
        return view('admin.foods.fish_show', compact('fishfoods', 'lowStockProducts'));;
    }
    public function fish_store(Request $request)
    {
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('image')->store('thumbnails');
        Fishfood::create($formData);

        return redirect('/admin/foods/fish_food/show');
    }
    public function fish_edit(Fishfood $id)
    {
        return view('admin.foods.fish_edit', [
            'fishfood' => $id,
            'companies' => Company::all()
        ]);
    }
    public function fish_update(Request $request, $id)
    {

        $fishfood = Fishfood::find($id);
        $formData = $request->validate([
            "code" => ["required"],
            "name" =>  ["required"],
            "company_id" =>  ["required", Rule::exists('companies', 'id')],
            "price" =>  ["required"],
            "quantity" =>  ["required"],
            "weight" =>  ["required"],
            "feeding_program" =>  ["required"]
        ]);
        $formData['image'] = $request->file('thumbnail') ?
            $request->file('thumbnail')->store('thumbnails') : $fishfood->image;
        $fishfood->update($formData);
        return redirect('/admin/foods/fish_food/show');
    }
    public function fish_destroy($id)
    {
        $fishfood = Fishfood::find($id);
        $fishfood->delete();
        return redirect('/admin/foods/fish_food/show')->with('danger', 'Fish livestock food is deleted');
    }
}
