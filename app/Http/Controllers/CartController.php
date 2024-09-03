<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cowfood;
use App\Models\Payment;
use App\Models\Pigfood;
use App\Models\Duckfood;
use App\Models\Fishfood;
use App\Models\Medicine;
use App\Models\Purchase;
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
            'product_type' => 'required|string', // The table name or type
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
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            return view('carts.show_cart', compact('carts'));
        } else {
            return redirect('/login');
        }
    }
    public function submit_cart()
    {
        $id = Auth::user()->id;
        $carts = Cart::where('user_id', '=', $id)->get();
        $customer = Auth::user();


        foreach ($carts as $item) {
            Purchase::create([
                'user_id' => $customer->id,
                'payment_id'=>$item->payment_id,
                'product_type' => $item->product_type,
                'product_name' => $item->product_name,
                'product_id' => $item->product_id,
                'product_price' => $item->product_price,
                'quantity' => $item->quantity,
                
            ]);
        }
        Cart::where('user_id', $customer->id)->delete();
        
        return  $view = view('carts.customer_card', compact('customer', 'carts'));
        
    }
    public function pay()
    {
        $id = Auth::user()->id;
        $user = Auth::user(); // Get the authenticated user
        $carts = Cart::where('user_id', '=', $id)->get()->where('archived', false);
        return view('carts.pay_system', compact('user', 'carts'));
    }
    public function done(Request $request)
    {
        // Validate input data
        $formData = $request->validate([
            "phoneno" => ["required"],
            "address" => ["required"],
            "payment" => ["required"]
        ]);

       

        $userId = Auth::id();
        // Handle file upload
        if ($request->hasFile('screenshot')) {
            $formData['screenshot'] = $request->file('screenshot')->store('thumbnails');
        }

        $payment = Payment::create(array_merge($formData, ['user_id' => $userId]));

        // Update cart items with the new payment_id
        Cart::where('user_id', $userId)->update(['payment_id' => $payment->id,'archived' => true]);
        Purchase::where('user_id', $userId)->update(['payment_id' => $payment->id]);
        
        // Redirect to homepage
        return redirect('/')->with('success', 'ဝယ်ယူအားပေးမှုအတွက်ကျေးဇူးအထူးတင်ရှိပါသည်');
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
        return redirect('/show_cart')->with('warning', 'မှာယူထားသောပစ္စည်းအားပယ်ဖျက်ပါသည်');
    }
    
}
