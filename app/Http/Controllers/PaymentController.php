<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Booking,Bin,BookingBin};
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function stripeCheckout(Request $request){
        $stripe_key = env('STRIPE_ENV_KEY');


        $customer_detail = [
            'address1' => $request->address1,
            'address2' => $request->address2,
            'postcode' => $request->postcode,
            'state' => $request->state,
            'booking_date' => $request->booking_date,
            'phone_number' => $request->phone_number
        ];



        // $customer_detail = session('customer_detail', []);


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
                    'address1' => $customer_detail['address1'] ,
                    'address2' => $customer_detail['address2'] ,
                    'postcode' => $customer_detail['postcode'] ,
                    'state' => $customer_detail['state'] ,
                    'booking_date' => $customer_detail['booking_date'] ,
                    'phone_number' => $customer_detail['phone_number'] ,

                ],
                'customer_email' => Auth::user()->email,
                

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

    public function stripeSuccess(Request $request){
        // Retrieve the Checkout Session ID from the query parameters
        $sessionId = $request->query('session_id');

        // Retrieve the Checkout Session from Stripe using the session ID
        $stripe = new \Stripe\StripeClient(env('STRIPE_ENV_KEY'));
        $checkoutSession = $stripe->checkout->sessions->retrieve($sessionId);

        // Retrieve the booking_id from the metadata of the Checkout Session
        $address1 = $checkoutSession->metadata->address1;
        $address2 = $checkoutSession->metadata->address2;
        $state = $checkoutSession->metadata->state;
        $postcode = $checkoutSession->metadata->postcode;
        $phone_number = $checkoutSession->metadata->phone_number;
        $booking_date = $checkoutSession->metadata->booking_date;

        $user_id = Auth::user()->id;
        $bookingId = Booking::insertGetId([
            'delivery_address' => $address1 . ',' . $address2 . ',' . $postcode . ',' .$state,
            'booking_date' => $booking_date,
            'phone_number' => $phone_number,
            'payment_status' => 'Paid',
            'status' => 'In Progress',
            'user_id' => $user_id,
        ]);

        $cart = session('cart', []);

        foreach ($cart as $item) {
            BookingBin::create([
                'bin_id' => $item['bin_id'],
                'quantity' => $item['quantity'],
                'booking_id' => $bookingId
            ]);
        }
        
        return view ('pages.payment-success');

    }

    public function stripeFailed(){

        return view ('pages.payment-failed');
    }
}
