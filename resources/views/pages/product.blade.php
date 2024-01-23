@extends('app')

@section('main')
        
<div class="bg-white">
    <div class="max-w-2xl mx-auto py-8 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 my-8">Product</h1>
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <div data-hs-carousel='{
                "loadingClasses": "opacity-0"
              }' class="relative">
              <div class="hs-carousel relative overflow-hidden w-full min-h-[350px] bg-white rounded-lg">
                <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                    @foreach ($data->image as $image)
                        <div class="hs-carousel-slide">
                            <div class="flex justify-center h-full bg-gray-100 p-6">
                                <span class="self-center text-4xl transition duration-700">
                                    <img src="{{ asset('storage/'.$image) }}" alt="">
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
              </div>
            
              <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                <span class="text-2xl" aria-hidden="true">
                  <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </span>
                <span class="sr-only">Previous</span>
              </button>
              <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                  <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </span>
              </button>
            
              <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                @foreach ($data->image as $image)
                    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-3 h-3 border border-gray-400 rounded-full cursor-pointer"></span>

                @endforeach
              </div>
            </div>

            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 flex items-center ">
                    {{ $data->bin_name }}
                    <span class="py-1 mx-4 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500 drop-shadow-md ">
                        <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                        Available
                    </span>
                </h1>
                
            
            <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <p class="text-lg text-gray-900">RM {{ $data->price }}</p>
                <p class="text-lg text-gray-600">(5 days rental)</p>
            </div>

    

            <div class="mt-6">
                <h3 class="sr-only">Description</h3>
    
                <div class="text-base text-gray-700 space-y-6">
                    {!! $data->description !!}
                </div>
            </div>
    
            <div class="border-t mt-12 divide-y divide-gray-200"></div>
            
            <div x-data="{ productId: {{ $data->id }}}">

                <button @click="addToCart(productId)" type="button" class="py-3 w-full text-center mt-4 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Rent now
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m5 11 4-7"/>
                        <path d="m19 11-4-7"/>
                        <path d="M2 11h20"/>
                        <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"/>
                        <path d="m9 11 1 9"/>
                        <path d="M4.5 15.5h15"/>
                        <path d="m15 11-1 9"/>
                    </svg>
                </button>
                <!-- Toast -->
                <div id="dismiss-toast-error" class="hidden absolute mt-5 w-full hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-red-100 border border-danger-200 rounded-xl shadow-lg" role="alert">
                    <div class="flex p-4">
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            You have exceed the quantity
                        </p>
                    </div>
                </div>
                <!-- End Toast -->
                <!-- Toast -->
                <div id="dismiss-toast-success" class="hidden absolute mt-5 w-full hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-green-100 border border-green-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700" role="alert">
                    <div class="flex p-4">
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            Item successfully added to cart.
                        </p>
                

                    </div>
                </div>
                <!-- End Toast -->
            </div>
                          

            </div>
            </div>
    
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function addToCart(productId) {
        axios.post('/add-to-cart', { product_id: productId })
            .then(response => {
                document.getElementById('dismiss-toast-success').classList.remove('hidden');

                setTimeout(() => {
                    document.getElementById('dismiss-toast-success').classList.add('hidden');
                }, 3000);
            })
            .catch(error => {
                document.getElementById('dismiss-toast-error').classList.remove('hidden');
                
                setTimeout(() => {
                    document.getElementById('dismiss-toast-error').classList.add('hidden');
                }, 3000);
            });
    }
</script>

@endsection