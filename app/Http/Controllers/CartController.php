<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cowfood;
use App\Models\Pigfood;
use App\Models\Duckfood;
use App\Models\Fishfood;
use App\Models\Medicine;
use App\Models\Chickenfood;
use App\Models\Pigbreeding;
use App\Models\Fishbreeding;
use Illuminate\Http\Request;
use App\Models\Chickenbreeding;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'product_type' => 'required|string', // The table name or type
            'product_id'   => 'required|integer', // The product ID in that table
            'quantity'     => 'required|integer', // The quantity to add to cart
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
        $user_id = $user->id;
    
        // Determine the product type and retrieve the product
        $productType = $validatedData['product_type'];
        $productId = $validatedData['product_id'];
    
        // Map the product type to the correct model
        $productModel = $this->getProductModel($productType);
    
        if (!$productModel) {
            return redirect()->back()->withErrors(['error' => 'Invalid product type.']);
        }
    
        // Find the product
        $product = $productModel::find($productId);
    
        if (!$product) {
            return redirect()->back()->withErrors(['error' => 'Product not found.']);
        }
    
        // Add the product to the cart
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_type = $productType;
        $cart->product_name = $product->name; // Assuming 'name' is the field in the product table
        $cart->product_id = $productId;
        $cart->product_price = $product->price; // Assuming 'price' is the field in the product table
        // $cart->product_image = $product->image; // Assuming 'image' is the field in the product table
        $cart->quantity = $validatedData['quantity'];
    
        $cart->save();
    
        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }
    protected function getProductModel($productType)
{
    // Map product types to models
    $productModels = [
        'chickenfood' => Chickenfood::class,
        'pigfood' => Pigfood::class,
        'duckfood' => Duckfood::class,
        'cowfood' => Cowfood::class,
        'fishfood' => Fishfood::class,
        'medicine' => Medicine::class,
        'cbreeding' => Chickenbreeding::class,
        'pbreeding' => Pigbreeding::class,
        'fbreeding' => Fishbreeding::class,
    ];

    // Return the model corresponding to the product type
    return $productModels[$productType] ?? null;
}

    
}
