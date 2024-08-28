<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cowfood;
use App\Models\Payment;
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
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Validate the request
        $validatedData = $request->validate([
            'product_type' => 'required|string',// The table name or type
            'product_name' => 'required|string', 
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
        
           // Check if there's enough stock
    if ($product->quantity < $validatedData['quantity']) {
        return redirect()->back()->with('error', 'လက်ကျန်ကုန်ဆုံးသွားပါပြီ');
    }
        // Add the product to the cart
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_type = $productType;
        $cart->product_name = $product->name; 
        $cart->product_id = $productId;
        $cart->product_price = $product->price; 
        $cart->quantity = $validatedData['quantity'];
    
        $cart->save();
        // Decrease the quantity in stock
    $product->decrement('quantity', $validatedData['quantity']);
    
        return redirect()->back()->with('success', 'ဈေးဝယ်ခြင်းထဲသို့အောင်မြင်စွာထည့်ပြီးပါပြီ');
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
  public function show_cart()
  {
    if(Auth::id())
    {
        $id = Auth::user()->id;
        $carts = Cart::where('user_id','=',$id)->get();
        return view('carts.show_cart',compact('carts'));
    }
    else{
        return redirect('/login');
    }
  }  
  public function submit_cart()
  {
    $id = Auth::user()->id;
    $carts = Cart::where('user_id','=',$id)->get();
    $customer = Auth::user(); // Assuming the customer is the authenticated user

    // Render the view with the customer and cart items
   return  $view = view('carts.customer_card', compact('customer', 'carts'));
    // $view = view('carts.customer_card', compact('customer', 'carts'))->render();

    // // Now, delete the cart items
    // Cart::where('user_id', $id)->delete();

    // // Return the rendered view
    // return $view;
    
  }
    public function pay()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('carts.pay_system', compact('user'));
    }
    public function done(Request $request)
    {
        // Validate input data
        $formData = $request->validate([
            "phoneno" => ["required"],
            "address" => ["required"],
            "payment" => ["required"]
        ]);

        // Get current authenticated user ID
        $formData['user_id'] = Auth::id();

        // Handle file upload
        if ($request->hasFile('screenshot')) {
            $formData['screenshot'] = $request->file('screenshot')->store('thumbnails');
        }

        // Create a new payment record
        Payment::create($formData);
        $id = Auth::user()->id;
        Cart::where('user_id', $id)->delete();

        // Redirect to homepage
        return redirect('/')->with('success','ဝယ်ယူအားပေးမှုအတွက်ကျေးဇူးအထူးတင်ရှိပါသည်');
    }


  
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        // Get the product type and product ID
        $productType = $cart->product_type;
        $productId = $cart->product_id;

        // Get the correct product model
        $productModel = $this->getProductModel($productType);

        // Find the product
        $product = $productModel::find($productId);

        if ($product) {
        // Restore the quantity in stock
        $product->increment('quantity', $cart->quantity);
        }
        $cart->delete();
        return redirect('/show_cart')->with('warning','မှာယူထားသောပစ္စည်းအားပယ်ဖျက်ပါသည်');
    }
}
