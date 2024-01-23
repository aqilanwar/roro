<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bin;

class PaymentController extends Controller
{
    public function stripeCheckout(){
        $stripe_key = env('STRIPE_ENV_KEY');

        $booking_details = $this->calculateCart();

        // dd($booking_details);

        try{
            $stripe = new \Stripe\StripeClient($stripe_key);

            $line_items = [];

            foreach($booking_details['booking_details'] as $booking){
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => $booking['name'],
                            'description' => '5 days rental service.',
                            'images' => [asset('storage/'.$booking['image'][0]) ],
                        ],
                    'unit_amount' => $booking['price'] * 100
                    ],
                'quantity' => $booking['quantity']
                ];
            }
    
            $checkout_session = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card', 'grabpay', 'fpx'],
    
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('stripeSuccess') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('stripeFailed'),
                'metadata' => [
                    'booking_id' => '1',
                    'deposit_price' => '100',
                    'total_price' => '5000'
                ],
                'customer_email' => 'razak@gmail.com'
                

              ]);
              
            return redirect ($checkout_session->url );
        }catch (\Stripe\Exception\ApiErrorException $e) {
            // Log or handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }

    public function calculateCart(){
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
                    'price' => $bin->price,
                    'total_price' => $bin->price * $item['quantity'], // Add totalPrice for each item
                ];

                $total_price += $quantity * $price;
            }

        }

        return [
            'booking_details' => $booking_details,
            'total_price' => $total_price,
        ];
    }

    public function stripeSuccess(){

        return view ('pages.payment-success');

    }

    public function stripeFailed(){

        return view ('pages.payment-failed');
    }
}
