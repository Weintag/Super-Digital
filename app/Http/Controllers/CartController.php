<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function addtocart($id)
{
    $cart = Cart::where([
        'user_id' => auth()->user()->id,
        'product_id' => $id
    ])->first();

    if(!$cart) {
        $cart = Cart::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$id,
            'count'=>1
        ]);
    } else {
        $cart->count += 1;
        $cart->save();
    }

    $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();

    return view('ajax.addCart', compact('carts'))->render();
}
public function delettocart($id)
{
    $cart = Cart::where([
        'user_id' => auth()->user()->id,
        'product_id' => $id
    ])->first();

    if($cart) {
        $cart->delete();
    }

    return true;
}

public function updatetocart(Request $request, $id) {
    $cart = Cart::where([
        'user_id' => auth()->user()->id,
        'product_id' => $id
    ])->first();

    if($cart) {
        if($request->type === 'add') {
            $cart->count += 1;
        } else if ($request->type === 'minus') {
            if($cart->count != 1) {
                $cart->count -= 1;
            }
        }
        $cart->save();
    }
    return true;
}
//-------------------------
}
