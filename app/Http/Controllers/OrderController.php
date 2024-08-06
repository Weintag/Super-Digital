<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{
    public function orders()
    {
        $title = 'Оформление заказа';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('orders', [
            'title' => $title,
            'carts' => $carts,

        ]);
    }

    public function payment(Request $request)
    { {
            $validator = Validator::make($request->all(), [
                'email' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'pay' => $request->pay,
                'email' => $request->email,
                'status' => 'Не оплачен'
            ]);

            $carts = Cart::where('user_id', auth()->user()->id)->get();

            foreach ($carts as $cart) {
                if ($cart->product->sale === '1') {
                    $price = $cart->product->pricesale;
                } else {
                    $price = $cart->product->price;
                }

                $orderProduct = OrderProduct::create([
                    'user_id'=>auth()->user()->id,
                    'order_id' => $order->id,
                    'product_id' => $cart->product->id,
                    'quantity' => $cart->count,
                    'price' => $price
                ]);

                $product = Catalog::find($cart->product->id);
                $product->quantity = $product->quantity - $orderProduct->quantity;
                $product->save();
            }
        }

       
        $url = URL::temporarySignedRoute('checkout', now()->addMinutes(10), []);
        
        return redirect($url);
        
    }
  

    public function pay(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'namederg' => 'required',
            'cardcode' => 'required',
            'datecard' => 'required',
            'code3' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $orderpay = Order::where('user_id', auth()->user()->id)->where('created_at', '>', now()->subMinutes(10))->where('status', 'Не оплачен')->update([
            'status' => 'Оплачен'
        ]);

        $order = Order::where('user_id', auth()->user()->id)->where('status', 'Оплачен')->where('updated_at', now())->with('user')->get();

        foreach($order as $ord){
        $orderproduct = OrderProduct::where('user_id', auth()->user()->id)->where('order_id', $ord->id)->with('catalog')->get();
        
        $totalPrice = 0;

        foreach($orderproduct as $ordprod){
            $totalPrice += $ordprod->price * $ordprod->quantity;
        }
   
        $email = $request->email;
  
        Mail::to($email)->send(new OrderMail($order, $orderproduct, $totalPrice));
        }
        $deleteCarts = Cart::where('user_id', auth()->user()->id)->delete();

    
        return redirect($request->input('protected_url'));
    }
}
