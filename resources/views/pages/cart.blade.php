@extends('app') @section('main')
    <!-- Hero -->
    <div class="relative bg-gradient-to-bl from-lime-100 via-transparent dark:from-green-950 dark:via-transparent">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2"> <!-- Left Section (Full Width Card) -->
                <div class="lg:col-span-1">
                    <div class="p-4 bg-white rounded-2xl shadow-lg dark:bg-slate-900 w-full p-8"> <!-- Card Content Goes Here -->
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Cart</h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Please complete the detail to proceed.</p>

                        @if($booking_details)
                            @foreach($booking_details as $data)
                            <div class="flex items-center justify-center"> <!-- Center the entire content -->
                                <!-- Image on the Right -->
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/'. $data['image'][0]) }}" alt="Image" class="h-16 w-16 object-cover rounded-lg">
                                </div>
                            
                                <!-- Title, Quantity, and Button Container -->
                                <div class="flex-grow ml-4 justify-center"> <!-- Center the content inside this div -->
                                    <!-- Title -->
                                    <h2 class="text-lg mt-8 font-semibold text-gray-800 dark:text-white">{{ $data['name'] }}</h2>
                            
                                    <!-- Small Quantity -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Quantity:  {{ $data['quantity'] }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Total: RM{{ $data['price'] }}</p>

                                    <!-- Button on the Right -->
                                    <div class="flex items-center justify-end mt-2">
                                        <a href="remove-from-cart?bin_id={{ $data['bin_id'] }}" class="px-3 py-2 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 rounded-full">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4">
                            
                            @endforeach
                            <div class="flex justify-end"> <!-- Center the entire content -->

                      
                                <!-- Title, Quantity, and Button Container -->
                                <div class="flex-end ml-4 justify-end "> <!-- Center the content inside this div -->
                                    <!-- Title -->
                                    <h5 class="text-lg mt-8 font-semibold text-gray-800 dark:text-white">Total Price</h5>
                            
                                    <!-- Small Quantity -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400">RM  {{ $total_price }}</p>
                                  
                                </div>
                            </div>
                        @else
                        <img class="mx-auto p-5" src="{{ asset('image/empty_cart.png') }}" width="300px" alt="empty cart">
                        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">Select product <a class="text-green-600 cursor-pointer" href="{{ route('product') }}">here</a></p>
                        @endif

                    </div>
                </div> <!-- End Left Section (Full Width Card) --> <!-- Right Section (Form) -->
                <div class="lg:col-span-1"> <!-- Form -->
                    <!-- Form -->
                    <form method="POST" action="{{ route('stripeCheckout') }}">
                        @csrf
                        <div class="lg:max-w-lg lg:mx-auto lg:me-0 ms-auto">
                            <!-- Card -->
                            <div class="p-4 sm:p-7 flex flex-col bg-white rounded-2xl shadow-lg dark:bg-slate-900">
                                <div class="text-center">
                                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Checkout Now!</h1>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Thank you for choosing us as your RoRo service!

                                    </p>
                                </div>

                                <div class="mt-5">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-2 gap-4">
                                        <!-- End Input Group -->
                                        <!-- Input Group -->
                                        <div class="relative col-span-full">
  
                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Phone Number</label>
                                                <input type="text" name="phone_number" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="e.g 60123456789" required>
                                            </div>
  
                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Address 1</label>
                                                <input type="text" name="address1" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Street Name" required>
                                            </div>
    
                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Address 2</label>
                                                <input type="text" name="address2" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Park Name" required>
                                            </div>


                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Postcode</label>
                                                <input type="postcode" name="postcode" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Postcode" required>
                                            </div>

                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">State</label>
                                                <input type="text" name="state" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="State" required>
                                            </div>
                                            <div class="col-span-full mt-5">
                                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Booking date</label>
                                                <input type="date" min="{{ now()->format('Y-m-d') }}" name="booking_date" id="input-label" class="py-3 px-4 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required>
                                            </div>
                                            <!-- Input Group -->
                                            @if(empty($booking_details))
                                            <div class="col-span-full mt-5">
                                                <button type="submit"
                                                    class="w-full block py-3 px-4 justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" disabled>Checkout</button>
                                            </div>

                                            @else
                                            <div class="col-span-full mt-5">
                                                <button type="submit"
                                                    class="w-full block py-3 px-4 justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Checkout</button>
                                            </div>
                                            @endif
                                            <!-- End Input Group -->
                                        </div>
                                        <!-- End Grid -->


                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                    </form>
                    <!-- End Form -->
                </div> <!-- End Right Section (Form) -->
            </div> <!-- End Grid -->
        </div> <!-- End Clients Section -->
    </div> <!-- End Hero -->
@endsection
