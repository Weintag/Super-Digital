<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Order;
use App\Models\Review;
use App\Models\Rubric;
use App\Models\User;
use App\Models\Cart;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
            'quantity' => 'required',
            'type' => 'required',
            'date' => 'required',
            'publisher' => 'required',
            'developer' => 'required',
            'platforms' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $catalog = Catalog::create([
            'category' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'date' => $request->date,
            'publisher' => $request->publisher,
            'developer' => $request->developer,
            'platforms' => $request->platforms,
            'genre' => implode(',', $request->genre),
        ]);
        if ($request->hasFile('image')) {

            $file = $request->image;
            $filename = $catalog->id . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/catalog/', $filename);
            $catalog->image = $filename;
            $catalog->save();
        }
        return redirect()->route('render-admin');
    }
    public function insertMessage(Request $request)
    {

        $rubric = Rubric::create([
            'email' => $request->email,
            'message' => $request->message
        ]);
        session()->flash('success', 'Сообщение было отправлено!');
        return redirect()->route('render-userPage');
    }
    public function insertReview(Request $request)
    {

        $review = Review::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'review' => $request->review,
            'type' => $request->type
        ]);
        session()->flash('success', 'Товар был успешно добавлен!');
        return redirect()->route('render-review');
    }

    public function sortprod(Request $request)
    {

        $catalogs = Catalog::orderBy($request->rowsname, $request->type)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('ajax.sortable', [
            'catalogs' => $catalogs,
            'carts' => $carts
        ])->render();
    }

    public function sortrubrics(Request $request)
    {
        $rubrics = Rubric::orderBy($request->rowsname, $request->type)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('ajax.sortablerub', [
            'rubrics' => $rubrics,
            'carts' => $carts
        ])->render();
    }
    public function sortreviews(Request $request)
    {
        $reviews = Review::orderBy($request->rowsname, $request->type)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('ajax.sortablerev', [
            'reviews' => $reviews,
            'carts' => $carts
        ])->render();
    }
    public function sortusers(Request $request)
    {
        $users = User::orderBy($request->rowsname, $request->type)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('ajax.sortableuse', [
            'users' => $users,
            'carts' => $carts
        ])->render();
    }
    public function sortorders(Request $request)
    {
        $orders = Order::orderBy($request->rowsname, $request->type)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('ajax.sortableord', [
            'orders' => $orders,
            'carts' => $carts
        ])->render();
    }
    public function sort(Request $request)
    {
        $title = 'Главная';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        } elseif ($sort === 'playstation4') {
            $product = Catalog::whereIn('platforms', ['Playstation 4', 'Playstation 4, Playstation 5'])->paginate(20);
        } elseif ($sort === 'playstation5') {
            $product = Catalog::whereIn('platforms', ['Playstation 5', 'Playstation 4, Playstation 5'])->paginate(20);
        } elseif ($sort === 'xbox360') {
            $product = Catalog::whereIn('platforms', ['Xbox 360', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxone') {
            $product = Catalog::whereIn('platforms', ['Xbox One', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxseriess') {
            $product = Catalog::whereIn('platforms', ['Xbox Series S/Xbox Series X'])->paginate(20);
        } elseif ($sort === 'pc') {
            $product = Catalog::where('platforms', 'PC')->paginate(20);
        }
        return view('home', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort1(Request $request)
    {
        $title = 'Steam';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $catalog = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        }elseif ($sort === 'pc') {
            $catalog = Catalog::where('platforms', 'PC')->paginate(20);
        }

        return view('steam', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort2(Request $request)
    {
        $title = 'Playstation';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        } elseif ($sort === 'playstation4') {
            $product = Catalog::whereIn('platforms', ['Playstation 4', 'Playstation 4, Playstation 5'])->paginate(20);
        } elseif ($sort === 'playstation5') {
            $product = Catalog::whereIn('platforms', ['Playstation 5', 'Playstation 4, Playstation 5'])->paginate(20);
        }
        return view('playstation', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort3(Request $request)
    {
        $title = 'Xbox';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        }elseif ($sort === 'xbox360') {
            $product = Catalog::whereIn('platforms', ['Xbox 360', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxone') {
            $product = Catalog::whereIn('platforms', ['Xbox One', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxseriess') {
            $product = Catalog::whereIn('platforms', ['Xbox Series S/Xbox Series X'])->paginate(20);
        }
        return view('xbox', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort4(Request $request)
    {
        $title = 'Epic Games';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        }elseif ($sort === 'pc') {
            $product = Catalog::where('platforms', 'PC')->paginate(20);
        }

        return view('epicgames', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort5(Request $request)
    {
        $title = 'GOG';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate();
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate();
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        }elseif ($sort === 'pc') {
            $product = Catalog::where('platforms', 'PC')->paginate();
        }

        return view('gog', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }
    public function sort6(Request $request)
    {
        $title = 'Акции';
        $sort = $request->input('sort');
        $catalog = Catalog::where('sale', '1')->take(4)->get();
        $product = Catalog::where('category', 'steam')->paginate(20);
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }
        if ($sort === 'asc') {
            $product = Catalog::orderBy('price', 'asc')->paginate(20);
        } elseif ($sort === 'desc') {
            $product = Catalog::orderBy('price', 'desc')->paginate(20);
        } elseif ($sort === 'Экшн') {
            $product = Catalog::whereIn('genre', ['Экшн', 'Экшн,Приключения', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Приключения') {
            $product = Catalog::whereIn('genre', ['Приключения', 'Экшн,Приключения', 'Экшн,Приключения,Ролевые','Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные'])->paginate(20);
        } elseif ($sort === 'Ролевые') {
            $product = Catalog::whereIn('genre', ['Ролевые', 'Экшн,Приключения,Ролевые', 'Экшн,Приключения,Ролевые,Казуальные', 'Ролевые,Экшн'])->paginate(20);
        } elseif ($sort === 'Стратегии') {
            $product = Catalog::whereIn('genre', ['Стратегии', 'Стратегии,Экшн', 'Стратегии,Ролевые', 'Ролевые,Стратегии'])->paginate(20);
        } elseif ($sort === 'Казуальные') {
            $product = Catalog::whereIn('genre', ['Казуальные', 'Экшн,Приключения,Казуальные', 'Экшн,Приключения,Ролевые,Казуальные', ])->paginate(20);
        } elseif ($sort === 'Спорт') {
            $product = Catalog::whereIn('genre', ['Спорт', 'Спорт,Гонки', 'Гонки,Спорт', 'Спорт,Казуальные', 'Гонки,Спорт,Казуальные'])->paginate(20);
        } elseif ($sort === 'Гонки') {
            $product = Catalog::where('genre', ['Гонки', 'Гонки,Спорт', 'Спорт,Гонки', 'Гонки,Спорт,Казуальные', 'Гонки,Казуальные', 'Казуальные,Спорт'])->paginate(20);
        } elseif ($sort === 'Симуляторы') {
            $product = Catalog::where('genre', ['Симуляторы', 'Симуляторы,Казуальные', 'Казуальные,Симуляторы'])->paginate(20);
        }elseif ($sort === 'playstation4') {
            $product = Catalog::whereIn('platforms', ['Playstation 4', 'Playstation 4, Playstation 5'])->paginate(20);
        } elseif ($sort === 'playstation5') {
            $product = Catalog::whereIn('platforms', ['Playstation 5', 'Playstation 4, Playstation 5'])->paginate(20);
        } elseif ($sort === 'xbox360') {
            $product = Catalog::whereIn('platforms', ['Xbox 360', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxone') {
            $product = Catalog::whereIn('platforms', ['Xbox One', 'Xbox 360, Xbox One'])->paginate(20);
        } elseif ($sort === 'xboxseriess') {
            $product = Catalog::whereIn('platforms', ['Xbox Series S/Xbox Series X'])->paginate();
        } elseif ($sort === 'pc') {
            $product = Catalog::where('platforms', 'PC')->paginate();
        }

        return view('stocks', [
            'title' => $title,
            'products' => $product,
            'catalogs' => $catalog,
            'carts' => $carts
        ]);
    }

    public function delete($id)
    {
        $image = Catalog::findOrFail($id);
        unlink('storage/catalog/' . $image->image);
        $image->delete();

        session()->flash('success', 'Товар был успешно удален!');
        return redirect()->route('render-admin');
    }
    public function deleterev($id)
    {

        $image = Review::findOrFail($id);
        $image->delete();
        session()->flash('success', 'Отзыв был успешно удален!');
        return redirect()->route('render-adminreviews');
    }
    public function deleterub($id)
    {

        $image = Rubric::findOrFail($id);
        $image->delete();
        session()->flash('success', 'Сообщение было успешно удалено!');
        return redirect()->route('render-adminrubrics');
    }
    public function deleteuse($id)
    {

        $image = User::findOrFail($id);
        $image->delete();
        session()->flash('success', 'Пользователь был успешно удален!');
        return redirect()->route('render-adminusers');
    }

    public function deleteord($id)
    {

        $image = Order::findOrFail($id);
        $image->delete();
        session()->flash('success', 'Пользователь был успешно удален!');
        return redirect()->route('render-adminorders');
    }
    public function deleteordersprod($id)
    {

        $image = OrderProduct::findOrFail($id);
        $image->delete();
        session()->flash('success', 'Пользователь был успешно удален!');
        return redirect()->route('render-adminorders');
    }

    public function update(Request $request, $id)
    {

        $catalog = Catalog::find($request->id);
        $catalog->category = $request->category;
        $catalog->name = $request->name;
        $catalog->price = $request->price;
        $catalog->quantity = $request->quantity;
        $catalog->type = $request->type;
        $catalog->date = $request->date;
        $catalog->genre = $request->genre;

        if ($request->hasFile('image')) {
            if ($catalog->image != null) {
                try {
                    unlink('storage/catalog/' . $catalog->image);
                } catch (\Exception $e) {
                    $errors[] = 'Фото с названием' . $catalog->image . 'не найдено';
                }
            }
            $file = $request->image;
            $filename = $catalog->id . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/catalog/', $filename);
            $catalog->image = $filename;
            $catalog->save();
        }
        $catalog = Catalog::where('id', $id)->update([
            'category' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'date' => $request->date,
            'publisher' => $request->publisher,
            'developer' => $request->developer,
            'platforms' => $request->platforms,
            'genre' => $request->genre
        ]);
        session()->flash('success', 'Товар был успешно обновлен!');
        return redirect()->route('render-admin');
    }
    public function updateuse(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if ($request->input('name')) {
            if ($user->name != null) {
                $user = User::where('id', $id)->update([
                    'name' => $request->name
                ]);
            }
        }
        if ($request->input('email')) {
            if ($user->email != null) {
                $user = User::where('id', $id)->update([
                    'email' => $request->email,
                    'email_verified_at' => null
                ]);
            }
        }
        if ($request->input('password')) {
            if ($user->password != null) {
                $user = User::where('id', $id)->update([
                    'password' => Hash::make($request->password)
                ]);
            }
        }
        session()->flash('success', 'Данные пользователя были успешно обновлены!');
        return redirect()->route('render-userPage');
    }
    public function updaterub(Request $request, $id)
    {

        $rubric = Rubric::where('id', $id)->update([
            'email' => $request->email,
        ]);
        if ($request->input('message')) {
            if ($request->message != null) {
                $rubric = Rubric::where('id', $id)->update([
                    'message' => $request->message
                ]);
            }
        }
        session()->flash('success', 'Сообщение было успешно обновлено!');
        return redirect()->route('render-adminrubrics');
    }
    public function updaterev(Request $request, $id)
    {

        $review = Review::where('id', $id)->update([
            'type' => $request->type

        ]);
        if ($request->input('review')) {
            if ($request->review != null) {
                $review = Review::where('id', $id)->update([
                    'review' => $request->review
                ]);
            }
        }
        session()->flash('success', 'Сообщение было успешно обновлено!');
        return redirect()->route('render-reviewsuser');
    }
    public function sale(Request $request, $id)
    {

        $catalog = Catalog::where('id', $id)->update([
            'sale' => $request->sale,
            'pricesale' => $request->pricesale
        ]);
        session()->flash('success', 'Товар был успешно обновлен!');
        return redirect()->route('render-admin');
    }
}
