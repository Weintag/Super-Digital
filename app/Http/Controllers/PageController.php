<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Review;
use App\Models\Rubric;
use App\Models\User;

class PageController extends Controller
{
    public function rendguar()
    {
        $title = 'Гарантии';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('guarantees', [
            'title' => $title,
            'carts' => $carts
        ]);
    }

    public function product($id)
    {

        $catalog = Catalog::where('id', $id)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('product', [
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function userAgr()
    {
        $title = 'Пользовательское соглашение';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('userAgreement', [
            'title' => $title,
            'carts' => $carts
        ]);
    }
    public function partners()
    {
        $title = 'Партнеры';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('partners', [
            'title' => $title,
            'carts' => $carts
        ]);
    }
    public function about()
    {
        $title = 'О магазине';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('about', [
            'title' => $title,
            'carts' => $carts
        ]);
    }
    public function admin()
    {
        $title = 'Админ';
        $catalog = Catalog::paginate(20);
        $count = Catalog::count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }


        return view('admin', [
            'title' => $title,
            'catalogs' => $catalog,
            'count' => $count,
            'carts' => $carts
        ]);
    }
    public function adminmetrika()
    {
        $title = 'Админ Метрика';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('adminmetrika', [
            'title' => $title,
            'carts' => $carts
        ]);
    }
    public function adminorders()
    {
        $title = 'Админ заказов';
        $order = Order::with('orderProducts', 'user')->paginate(20);
        $count = Order::count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('adminorders', [
            'title' => $title,
            'orders' => $order,
            'count' => $count,
            'carts' => $carts
        ]);
    }
    public function adminorderproducts($id)
    {
        $title = 'Товары заказа';
        $orderproducts = OrderProduct::where('order_id', $id)->with('catalog')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('adminorderproducts', [
            'title' => $title,
            'orderproducts' => $orderproducts,
            'carts' => $carts
        ]);
    }
    public function adminreviews()
    {
        $title = 'Админ отзывов';
        $review = Review::paginate(20);
        $count = Review::count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('adminreviews', [
            'title' => $title,
            'reviews' => $review,
            'count' => $count,
            'carts' => $carts
        ]);
    }
    public function adminrubrics()
    {
        $title = 'Админ Рубриков';
        $rubric = Rubric::paginate(20);
        $count = Rubric::count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('adminrubrics', [
            'title' => $title,
            'rubrics' => $rubric,
            'count' => $count,
            'carts' => $carts
        ]);
    }
    public function adminusers()
    {
        $title = 'Админ Пользователей';
        $user = User::paginate(20);
        $count = User::where('admin', '0')->count();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('adminusers', [
            'title' => $title,
            'users' => $user,
            'count' => $count,
            'carts' => $carts
        ]);
    }
    public function epicgames()
    {
        $title = 'Epic Games';
        $product = Catalog::where('sale', '0')->where('category', 'epicgames')->paginate(20);
        $catalog = Catalog::where('sale', '1')->where('category', 'epicgames')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('epicgames', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function gog()
    {
        $title = 'GOG';
        $product = Catalog::where('sale', '0')->where('category', 'gog')->paginate(20);
        $catalog = Catalog::where('sale', '1')->where('category', 'gog')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('gog', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function playstation()
    {
        $title = 'Playstation';
        $product = Catalog::where('sale', '0')->where('category', 'playstation')->paginate(20);
        $catalog = Catalog::where('sale', '1')->where('category', 'playstation')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('playstation', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function reviews()
    {
        $title = 'Отзывы';
        $review = Review::all();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('reviews', [
            'title' => $title,
            'reviews' => $review,
            'carts' => $carts
        ]);
    }
    public function reviewsneg()
    {
        $title = 'Отрицательные отзывы';
        $review = Review::all();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('reviewsneg', [
            'title' => $title,
            'reviews' => $review,
            'carts' => $carts
        ]);
    }
    public function sale($id)
    {
        $title = 'Акции';
        $catalog = Catalog::where('id', $id)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('sale', [
            'title' => $title,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function orderproduct($id)
    {
        $title = 'Информация о товаре';
        $orderproducts = OrderProduct::where('id', $id)->with('catalog')->get();
        $orderprods = OrderProduct::where('order_id', $id)->with('catalog')->get();
        $activationCode = strtoupper(bin2hex(random_bytes(8)));
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('orderproduct', [
            'title' => $title,
            'carts' => $carts,
            'orderproducts' => $orderproducts,
            'orderprods' => $orderprods,
            'activationCode' => $activationCode
        ]);
    }
    public function orderproducts($id)
    {
        $title = 'Информация о товаре';
        $orderprods = OrderProduct::where('order_id', $id)->with('catalog')->get();
        $activationCode = strtoupper(bin2hex(random_bytes(8)));
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        return view('orderproducts', [
            'title' => $title,
            'carts' => $carts,
            'orderprods' => $orderprods,
            'activationCode' => $activationCode
        ]);
    }
    public function steam()
    {
        $title = 'Steam';
        $product = Catalog::where('sale', '0')->where('category', 'steam')->paginate(20);
        $catalog = Catalog::where('sale', '1')->where('category', 'steam')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('steam', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function stocks()
    {
        $title = 'Акции';
        $product = Catalog::where('sale', '1')->paginate(20);
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('stocks', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function update($id)
    {
        $title = 'Обновление товара';
        $catalog = Catalog::where('id', $id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('update', [
            'title' => $title,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function reviewsuser()
    {
        $title = 'Отзывы пользователя';
        $review = Review::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('reviewsuser', [
            'title' => $title,
            'reviews' => $review,
            'carts' => $carts
        ]);
    }
    public function updaterev($id)
    {
        $title = 'Редактирование отзыва';
        $review = Review::where('id', $id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('updaterev', [
            'title' => $title,
            'reviews' => $review,
            'carts' => $carts
        ]);
    }
    public function updaterub($id)
    {
        $title = 'Редактирование сообщения';
        $rubric = Rubric::where('id', $id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('updaterub', [
            'title' => $title,
            'rubrics' => $rubric,
            'carts' => $carts
        ]);
    }
    public function updateuse($id)
    {
        $title = 'Настройки';
        $user = User::where('id', $id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('updateuse', [
            'title' => $title,
            'users' => $user,
            'carts' => $carts
        ]);
    }
    public function userPage()
    {
        $title = 'Личный кабинет';
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        $orderproducts = OrderProduct::where('user_id', auth()->user()->id)->with('catalog', 'order')->paginate(12);
        return view('userPage', [
            'title' => $title,
            'carts' => $carts,
            'orderproducts' => $orderproducts
        ]);
    
    }
    public function xbox()
    {
        $title = 'Xbox';
        $product = Catalog::where('sale', '0')->where('category', 'xbox')->paginate(20);
        $catalog = Catalog::where('sale', '1')->where('category', 'xbox')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('xbox', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts

        ]);
    }
    public function pay()
    {
        $title = "Успешная оплата";
        $orderproduct = OrderProduct::where('user_id', auth()->user()->id)->with('order')->get();
        return view('pay', [
            'title' => $title,
            'orderproducts' => $orderproduct
        ]);
    }
    public function errorpay()
    {
        $title = "Ошибка оплаты";

        return view('errorpay', [
            'title' => $title
        ]);
    }
    public function steam_activation(){
        $title = 'Как активировать в Steam?';

        return view('introdution.steam-activation', [
            'title' => $title
        ]);
    }
    public function playstation_activation(){
        $title = 'Как активировать в Playstation?';

        return view('introdution.playstation-activation', [
            'title' => $title
        ]);
    }
    public function xbox_activation(){
        $title = 'Как активировать в Xbox?';

        return view('introdution.xbox-activation', [
            'title' => $title
        ]);
    }
    public function epicgames_activation(){
        $title = 'Как активировать игру в Epic Games Store?';

        return view('introdution.epicgames-activation', [
            'title' => $title
        ]);
    }
    public function gog_activation(){
        $title = 'Как активировать ключ в GOG.com?';

        return view('introdution.gog-activation', [
            'title' => $title
        ]);
    }
}
