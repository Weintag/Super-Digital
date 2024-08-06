<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create(){
        $title = 'Регистрация';
        if (auth()->user() !== null) {
            $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
            } else{
                $carts = Cart::get();
            }
        return view('register',[
            'title'=>$title,
            'carts'=>$carts
        ]);
    }

    public function store(Request $request){
      
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|max:20|unique:App\Models\User',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:8|confirmed',
            'politic' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'admin' => 0,
        ]);
        event(new Registered($user));
        Auth::login($user);
        session()->flash('success', 'Регистрация прошла успешно');
        return redirect(RouteServiceProvider::HOME);
    } 
}
