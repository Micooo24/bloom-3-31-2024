<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    
   public function index(){
        $user = Auth::user();
        $data_order = Order::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['product:id,product_name,product_description,product_price'])->get();
        
        return view('order.index', ['data_order'=>$data_order]);
    }

// public function addToCart($id)
//     {
//         $product = Product::findOrFail($id);
 
//         $cart = session()->get('cart', []);
 
//         if(isset($cart[$id])) {
//             $cart[$id]['quantity']++;
//         }  else {
//             $cart[$id] = [
//                 "product_name" => $product->product_name,
//                 "product_image" => $product->product_image,
//                 "product_price" => $product->product_price,
//                 "quantity" => 1
//             ];
//         }
 
//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', 'Product add to cart successfully!');
//     }

}
