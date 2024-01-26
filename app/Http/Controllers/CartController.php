<?php

namespace App\Http\Controllers;

use App\Models\{Bin, Booking};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $cart = []; 

    public function deleteFromCart(Request $request){
        $cart = session('cart', []);

        // Get the bin_id to be removed from the request
        $binIdToRemove = $request->input('bin_id');
    
        // Use array_filter to create a new array without the specified bin_id
        $cart = array_filter($cart, function ($item) use ($binIdToRemove) {
            return $item['bin_id'] != $binIdToRemove;
        });
    
        // Update the cart in the session
        session(['cart' => $cart]);
    
        // Other logic or response as needed
        // For example, redirect back to the cart page
        return redirect()->route('view.cart');

    }
    public function viewCart(){
        $cart = session('cart', []);

        $booking_details = [];
        $total_price =0 ;
        foreach ($cart as $item) {
            $bin = Bin::find($item['bin_id']);
            if ($bin) {
                $quantity = $item['quantity'];
                $price = $bin->price;

                $booking_details[] = [
                    'bin_id' => $bin->id,
                    'image' => $bin->image,
                    'name' => $bin->bin_name,
                    'quantity' => $item['quantity'],
                    'price' => $bin->price * $item['quantity'], // Add totalPrice for each item
                ];

                $total_price += $quantity * $price;
            }

        }

        // dd($booking_details);

        // dd($cart);

        return view ('pages.cart', compact('booking_details' , 'total_price'));
    }
    public function addToCart(Request $request){
            
        // Get the current cart data from the session
        $cart = session('cart', []);

        $product_id = $request->product_id;

        //Do validation if the item is booked or not ?

        $bin = Bin::find($product_id);

        $totalBooked = Booking::where('status', 'In Progress')
        ->join('booking_bins', function ($join) use ($product_id) {
            $join->on('bookings.id', '=', 'booking_bins.booking_id')
                ->where('booking_bins.bin_id', '=', $product_id);
        })
        ->sum('booking_bins.quantity');

        // dd($totalBooked);
    

        // $totalBooked = Booking::where('bin_id', $product_id)
        // ->where('status', 'In Progress')
        // ->where('payment_status' , 'Paid')
        // ->sum('quantity');

        $totalAvailable = $bin->quantity - $totalBooked;


        // return $totalAvailable;
        // Assuming $cart and $product_id are already defined

        // Check if the product_id already exists in the cart

        if($totalAvailable == 0){
            return response()->json([
                'status' => 'error',
                'message' => 'You have exceeded the quantity of available bin.',
            ], 422);
        }else{
            if (isset($cart[$product_id])) {
                // If it exists, update the quantity
                if ($cart[$product_id]['quantity'] >= $totalAvailable) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'You have exceeded the quantity of available bin.',
                    ], 422);
                } else {
                    // Increment the quantity
                    $cart[$product_id]['quantity'] += 1;
                }
            } else {
                // If it doesn't exist, add it to the cart
                $cart[$product_id] = [
                    'bin_id' => $product_id, // Assuming bin_id is the same as product_id in this example
                    'quantity' => 1,
                    'price' => 100,
                ];
            }
        }
       

        // Continue with the rest of your logic
        Session::put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to the cart successfully.',
        ]);
            
    }

    public function getCart(){
        $cart = session('cart', []);

        return $cart;
    }
}
