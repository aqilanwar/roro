<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\IsCustomer;
use App\Models\Bin;

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

Route::get('/', function () {
    $data = Bin::all();
    return view('pages.home',  compact('data'));
})->name('home');

Route::get('/cart', function (){
    return 'hehe';
})->middleware([IsCustomer::class, Authenticate::class])->name('cart');

Route::get('/login', function () {
    return redirect(route('filament.customer.auth.login'));
})->name('login');

Route::get('/product', function (Request $request) {
    $id = $request->id;
    $data = Bin::find($id);
    return view ('pages.product' , compact('data'));
})->name('product');
