<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use mysqli;

class AuthController extends Controller
{

    public function create()
    {
        $title = 'Авторизация';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        } else {
            $carts = Cart::get();
        }

        return view('login', [
            'title' => $title,
            'carts' => $carts
        ]);
    }

    //---------------------------------------------------------------------------
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if (Auth::viaRemember()) {
                return redirect()->route('render-home');
            } else {
                return redirect()->route('render-home');
            }
        } else {
            return back()->withErrors([
                'password' => 'Неправильный пароль или почта'
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('render-home');
    }
    //----------------------------------------------------------------


}
