<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve cart items from the session (you need to implement this logic)
        
        $cartItems = session()->get('cart', []);

        // You can retrieve product details for each cart item if needed
        // For example, you can retrieve product name, price, etc. from the database

        // Pass cart items to the cart view for display
        return view('cart.index', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Add the product to the cart (you need to implement this logic)
        // For example, you can store the cart in the session

        return redirect()->back()->with('success', 'Product added to cart');
    }

    // public function makeCart(){
    //     $user_id = Auth::id();

    //     $cart = new Cart();
    //     $cart->user_id = $user_id;
    //     $item->save();
    // }
}
