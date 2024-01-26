<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\IsCustomer;
use App\Models\{Bin, Booking};
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{CartController, PaymentController};
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

// Route::get('/cart', function (){
//     return 'hehe';
// })->middleware([IsCustomer::class, Authenticate::class])->name('cart');

Route::get('/login', function () {
    return redirect(route('filament.customer.auth.login'));
})->name('login');

Route::post('/add-to-cart', [CartController::class, 'addToCart']);

Route::get('/product', function (Request $request) {
    
    if($request->id){
        $id = $request->id;

        $bin = Bin::find($id);

        $totalBooked = Booking::where('status', 'In Progress')
        ->join('booking_bins', function ($join) use ($id) {
            $join->on('bookings.id', '=', 'booking_bins.booking_id')
                ->where('booking_bins.bin_id', '=', $id);
        })
        ->sum('booking_bins.quantity');

        // $totalBinQuantity = Booking::where('status', 'In Progress')
        // ->join('booking_bins', 'bookings.id', '=', 'booking_bins.booking_id')
        // ->sum('booking_bins.quantity');
        // foreach ($totalBooked as $booking) {
        //     dd($booking->booking_bin->quantity);
        // }


        // dd($totalBinQuantity);

        $binAvailable = $bin->quantity - $totalBooked;

        $data = $bin;

        $data->bin_available = $binAvailable;


        return view ('pages.product' , compact('data'));

    }else{
        $data = Bin::all();
        return view ('pages.view-product' , compact('data'));

    }


})->name('product');


Route::get('/dashboard' , function (){
    if(Auth::user()->role === 'ADMIN')
        return redirect ('/admin');
    else if(Auth::user()->role === 'EMPLOYEE')
        return redirect ('/employee');
    else if(Auth::user()->role === 'CUSTOMER')
        return redirect ('/customer');
})->middleware('auth')->name('dashboard');

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::post('/add-to-cart' , [CartController::class, 'addToCart']);
Route::get('/get-cart' , [CartController::class, 'getCart']);
Route::get('/cart' , [CartController::class, 'viewCart'])->name('view.cart')->middleware(IsCustomer::class, Authenticate::class);
Route::get('/remove-from-cart' , [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
Route::post('/payment-gateway' , [PaymentController::class, 'stripeCheckout'])->name('stripeCheckout');
Route::get('/success' , [PaymentController::class, 'stripeSuccess'])->name('stripeSuccess');
Route::get('/failed' , [PaymentController::class, 'stripeFailed'])->name('stripeFailed');
