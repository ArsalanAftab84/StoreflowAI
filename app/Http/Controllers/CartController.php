<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $this->getCart($request);
        
        return Inertia::render('Store/Cart', [
            'cart' => $cart ? $cart->load('items.product') : null
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $cart = $this->getOrCreateCart($request);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove(Request $request, CartItem $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    public function updateQuantity(Request $request, CartItem $item)
    {
        $action = $request->input('action'); 

        if ($action === 'increment') {
            $item->increment('quantity');
        } elseif ($action === 'decrement') {
            if ($item->quantity > 1) {
                $item->decrement('quantity');
            } else {
                $item->delete(); 
            }
        }

        return redirect()->back(); 
    }

    private function getCart(Request $request)
    {
        if (auth()->check()) {
            return Cart::where('user_id', auth()->id())->first();
        }

        return Cart::where('session_id', $request->session()->getId())->first();
    }

    private function getOrCreateCart(Request $request)
    {
        $cart = $this->getCart($request);

        if (!$cart) {
            if (auth()->check()) {
                $cart = Cart::create(['user_id' => auth()->id()]);
            } else {
                $cart = Cart::create(['session_id' => $request->session()->getId()]);
            }
        }

        return $cart;
    }
}
