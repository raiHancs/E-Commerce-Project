<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity ?? 1;
        $cart->save();

        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart.view', compact('cartItems'));
    }
}
