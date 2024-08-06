<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\EmailVerificationNotificationController;
use App\Http\Controllers\EmailVerificationPromptController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'render'])->name('render-home');

Route::get('/register', [RegisterController::class, 'create'])->name('render-register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

Route::get('/guarantees', [PageController::class, 'rendguar'])->name('render-guar');
Route::get('/reviews', [PageController::class, 'reviews'])->name('render-review');
Route::get('/product/{id}', [PageController::class, 'product'])->name('render-prod');
Route::get('/userAgreement', [PageController::class, 'userAgr'])->name('render-userAgr');
Route::get('/partners', [PageController::class, 'partners'])->name('render-partner');
Route::get('/about', [PageController::class, 'about'])->name('render-about');
Route::get('/epicgames', [PageController::class, 'epicgames'])->name('render-epicgames');
Route::get('/gog', [PageController::class, 'gog'])->name('render-gog');
Route::get('/orders', [PageController::class, 'order'])->name('render-orders');
Route::get('/playstation', [PageController::class, 'playstation'])->name('render-playstation');
Route::get('/reviewsneg', [PageController::class, 'reviewsneg'])->name('render-reviewsneg');
Route::get('/sale/{id}', [PageController::class, 'sale'])->name('render-sale');
Route::get('/steam', [PageController::class, 'steam'])->name('render-steam');
Route::get('/stocks', [PageController::class, 'stocks'])->name('render-stocks');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
        ->name('password.update');

Route::get('/xbox', [PageController::class, 'xbox'])->name('render-xbox');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])
        ->name('verification.send');

    Route::view('/dashboard', 'dashboard')->middleware('verified')
        ->name('dashboard');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin', [PageController::class, 'admin'])->name('render-admin');
    Route::get('/adminorders', [PageController::class, 'adminorders'])->name('render-adminorders');
    Route::get('/adminreviews', [PageController::class, 'adminreviews'])->name('render-adminreviews');
    Route::get('/adminrubrics', [PageController::class, 'adminrubrics'])->name('render-adminrubrics');
    Route::get('/adminusers', [PageController::class, 'adminusers'])->name('render-adminusers');
    Route::get('/adminorderproducts/{id}', [PageController::class, 'adminorderproducts'])->name('render-adminorderproducts');

    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/payment', [OrderController::class, 'payment'])->name('payment');

    Route::get('/reviewsuser', [PageController::class, 'reviewsuser'])->name('render-reviewsuser');
    Route::get('/orderproduct/{id}', [PageController::class, 'orderproduct'])->name('render-orderproduct');
    Route::get('/orderproducts/{id}', [PageController::class, 'orderproducts'])->name('render-orderproducts');
    
    Route::get('/checkout', function(){
        $title = 'Оплата';
        if(Order::where('user_id', auth()->user()->id)->where('status', 'Не оплачен')){
        $orderproduct = OrderProduct::where('user_id', auth()->user()->id)->where('created_at', '>', now()->subMinutes(2))->with('catalog')->get();
        }
        $order = Order::where('user_id', auth()->user()->id)->where('created_at', '>', now()->subMinutes(2))->where('status', 'Не оплачен')->with('user')->get();
        $totalPrice = 0;
        $protectedUrl = URL::temporarySignedRoute('errorpay', now()->addMinutes(2), []);
        $protectUrl = URL::temporarySignedRoute('render-pay', now()->addMinutes(2), []);
        foreach($orderproduct as $ordprod){
            $totalPrice += $ordprod->price * $ordprod->quantity;
        }
        return view('checkout',[
            'title' => $title,
            'orders' => $order,
            'totalPrice' => $totalPrice,
            'protectedUrl' => $protectedUrl,
            'protectUrl'=>$protectUrl
        ]);
    })->middleware('signed')->name('checkout');

    Route::get('/pay', [PageController::class, 'pay'])->middleware('signed')->name('render-pay');
    Route::get('/errorpay', [PageController::class, 'errorpay'])->middleware('signed')->name('errorpay');

    Route::post('/pay', [OrderController::class, 'pay'])->name('pay');

    Route::get('/introdution/steam-activation/', [PageController::class, 'steam_activation'])->name('render-steam-activation');
    Route::get('/introdution/playstation-activation/', [PageController::class, 'playstation_activation'])->name('render-playstation-activation');
    Route::get('/introdution/xbox-activation/', [PageController::class, 'xbox_activation'])->name('render-xbox-activation');
    Route::get('/introdution/epicgames-activation/', [PageController::class, 'epicgames_activation'])->name('render-epicgames-activation');
    Route::get('/introdution/gog-activation/', [PageController::class, 'gog_activation'])->name('render-gog-activation');

    Route::get('/update/{id}', [PageController::class, 'update'])->name('render-update');
    Route::get('/updateord/{id}', [PageController::class, 'updateord'])->name('render-updateord');
    Route::get('/updaterev/{id}', [PageController::class, 'updaterev'])->name('render-updaterev');
    Route::get('/updaterub/{id}', [PageController::class, 'updaterub'])->name('render-updaterub');
    Route::get('/updateuse/{id}', [PageController::class, 'updateuse'])->name('render-updateuse');

    Route::post('/insert', [InfoController::class, 'insert'])->name('insert');
    Route::post('/insertMessage', [InfoController::class, 'insertMessage'])->name('insertMessage');
    Route::post('/insertReview', [InfoController::class, 'insertReview'])->name('insertReview');

    Route::post('/delete/{id}', [InfoController::class, 'delete'])->name('delete');
    Route::post('/deleterub/{id}', [InfoController::class, 'deleterub'])->name('deleterub');
    Route::post('/deleterev/{id}', [InfoController::class, 'deleterev'])->name('deleterev');
    Route::post('/deleteuse/{id}', [InfoController::class, 'deleteuse'])->name('deleteuse');
    Route::post('/deleteord/{id}', [InfoController::class, 'deleteord'])->name('deleteord');
    Route::post('/deleteordersprod/{id}', [InfoController::class, 'deleteordersprod'])->name('deleteordersprod');
    Route::post('/update/{id}', [InfoController::class, 'update'])->name('update');
    Route::post('/updaterub/{id}', [InfoController::class, 'updaterub'])->name('updaterub');
    Route::post('/updateuse/{id}', [InfoController::class, 'updateuse'])->name('updateuse');
    Route::post('/updaterev/{id}', [InfoController::class, 'updaterev'])->name('updaterev');
    Route::post('/updateord/{id}', [InfoController::class, 'updateord'])->name('updateord');

    Route::post('/addtocart/{id}', [CartController::class, 'addtocart'])->name('addcart');
    Route::post('/delettocart/{id}', [CartController::class, 'delettocart'])->name('deletcart');
    Route::post('/updatetocart/{id}', [CartController::class, 'updatetocart'])->name('updatecart');

    Route::post('/sale/{id}', [InfoController::class, 'sale'])->name('sale');
    Route::get('/userPage', [PageController::class, 'userPage'])->name('render-userPage');

    Route::post('/sortprod', [InfoController::class, 'sortprod']);
    Route::post('/sortusers', [InfoController::class, 'sortusers']);
    Route::post('/sortreviews', [InfoController::class, 'sortreviews']);
    Route::post('/sortrubrics', [InfoController::class, 'sortrubrics']);
    Route::post('/sortorders', [InfoController::class, 'sortorders']);
});

Route::get('/sort', [InfoController::class, 'sort'])->name('sort');
Route::get('/sort1', [InfoController::class, 'sort1'])->name('sort1');
Route::get('/sort2', [InfoController::class, 'sort2'])->name('sort2');
Route::get('/sort3', [InfoController::class, 'sort3'])->name('sort3');
Route::get('/sort4', [InfoController::class, 'sort4'])->name('sort4');
Route::get('/sort5', [InfoController::class, 'sort5'])->name('sort5');
Route::get('/sort6', [InfoController::class, 'sort6'])->name('sort6');
Route::get('/sort7', [InfoController::class, 'sort7'])->name('sort7');
