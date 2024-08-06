<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{

    public function render(){
        $title = 'Главная';
        $product = Catalog::where('sale', '0')->paginate(20);
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        if (auth()->user() !== null) {
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else{
            $carts = Cart::get();
        }

        return view('home', [
            'title'=>$title,
            'products'=>$product,
            'catalogs'=>$catalog,
            'carts' => $carts
        ]);
    }
    public function search(Request $request){

        $s = $request->s;
        $title = 'Главная';
        $catal = Catalog::where('name', 'LIKE', "%{$s}%")->orderBy('name')->get();
        $count = Catalog::where('name', 'LIKE', "%{$s}%")->orderBy('name')->count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
            } else{
                $carts = Cart::get();
            }

        return view('resultsearch', [
            'title'=>$title, 
            'catalogs'=>$catal,
            'count'=>$count,
            'carts'=>$carts
        ]);
    }
    public function sort($criteria)
{
    $catalog = Catalog::orderBy($criteria)->get();
    $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
    return view('items.index', [
        'catalogs'=>$catalog,
        'carts'=>$carts
    ]);
}
}