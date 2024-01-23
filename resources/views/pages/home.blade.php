@extends('app')

@section('main')
<div class="relative bg-gradient-to-bl from-lime-100 via-transparent dark:from-green-950 dark:via-transparent">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 mb-[100px]">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            <div>
                <h1
                    class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                    Get your place cleaned with <br> <span class="text-green-600">KS Recycle Resource</span></h1>
                <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">Hand-picked professionals and expertly crafted
                    components, designed for any kind of entrepreneur.</p>

                <!-- Buttons -->
                <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                    <a class="py-3 font-bold px-4 w-full inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        View product
                    </a>
                </div>
                
                <!-- End Buttons -->

            </div>
            <!-- End Col -->

            <div class="relative mt-4">
                <img class="w-full rounded-md object-contain" src="{{ asset('image/hero-1.jpeg') }}" alt="Hero Image">
                <div
                    class="absolute inset-0 -z-[1] w-full h-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6">
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
</div>
<!-- End Hero -->

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="relative p-6 md:p-16">
        <!-- Grid -->
        <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
            <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">
                <h2 class="text-2xl text-gray-800 font-bold sm:text-3xl dark:text-gray-200">
                    Fully customizable rules to match your unique needs
                </h2>

                <!-- Tab Navs -->
                <nav class="grid gap-4 mt-5 md:mt-10" aria-label="Tabs" role="tablist">
                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 active"
                        id="tabs-with-card-item-1" data-hs-tab="#tabs-with-card-1" aria-controls="tabs-with-card-1"
                        role="tab">
                        <span class="flex">
                            <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z" />
                                <path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z" />
                                <path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z" />
                                <path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z" />
                                <path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z" />
                            </svg>
                            <span class="grow ms-6">
                                <span
                                    class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Advanced
                                    tools</span>
                                <span
                                    class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Use
                                    Preline thoroughly thought and automated libraries to manage your businesses.</span>
                            </span>
                        </span>
                    </button>

                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        id="tabs-with-card-item-2" data-hs-tab="#tabs-with-card-2" aria-controls="tabs-with-card-2"
                        role="tab">
                        <span class="flex">
                            <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m12 14 4-4" />
                                <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                            </svg>
                            <span class="grow ms-6">
                                <span
                                    class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Smart
                                    dashboards</span>
                                <span
                                    class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Quickly
                                    Preline sample components, copy-paste codes, and start right off.</span>
                            </span>
                        </span>
                    </button>
                </button>

                <button type="button"
                    class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    id="tabs-with-card-item-2" data-hs-tab="#tabs-with-card-2" aria-controls="tabs-with-card-2"
                    role="tab">
                    <span class="flex">
                        <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m12 14 4-4" />
                            <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                        </svg>
                        <span class="grow ms-6">
                            <span
                                class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Smart
                                dashboards</span>
                            <span
                                class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Quickly
                                Preline sample components, copy-paste codes, and start right off.</span>
                        </span>
                    </span>
                </button>

                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        id="tabs-with-card-item-3" data-hs-tab="#tabs-with-card-3" aria-controls="tabs-with-card-3"
                        role="tab">
                        <span class="flex">
                            <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                                <path d="M5 3v4" />
                                <path d="M19 17v4" />
                                <path d="M3 5h4" />
                                <path d="M17 19h4" />
                            </svg>
                            <span class="grow ms-6">
                                <span
                                    class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Powerful
                                    features</span>
                                <span
                                    class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Reduce
                                    time and effort on building modern look design with Preline only.</span>
                            </span>
                        </span>
                    </button>
                    
                </nav>
                <!-- End Tab Navs -->
            </div>
            <!-- End Col -->

            <div class="lg:col-span-6">
                <div class="relative">
                    <!-- Tab Content -->
                    <div>
                        <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1">
                            <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]"
                                src="{{ asset('image/hero-1.jpeg') }}"
                                alt="Image Description">
                        </div>

                        <div id="tabs-with-card-2" class="hidden" role="tabpanel"
                            aria-labelledby="tabs-with-card-item-2">
                            <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]"
                            src="{{ asset('image/large-1.jpg') }}"
                            alt="Image Description">
                        </div>

                        <div id="tabs-with-card-3" class="hidden" role="tabpanel"
                            aria-labelledby="tabs-with-card-item-3">
                            <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]"
                                src="{{ asset('image/large-2.jpg') }}"
                                alt="Image Description">
                        </div>
                    </div>
                    <!-- End Tab Content -->

                    <!-- SVG Element -->
                    <div class="hidden absolute top-0 end-0 translate-x-20 md:block lg:translate-x-20">
                        <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                        </svg>
                    </div>
                    <!-- End SVG Element -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->

        <!-- Background Color -->
        <div class="absolute inset-0 grid grid-cols-12 w-full h-full">
            <div
                class="col-span-full lg:col-span-7 lg:col-start-6 bg-gray-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full dark:bg-white/[.075]">
            </div>
        </div>
        <!-- End Background Color -->
    </div>
</div>
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl text-gray-800 font-bold sm:text-3xl dark:text-gray-200">
            Our best products
        </h2>
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Fully customizable rules to match your needs.</h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($data as $product)                
            <div class="group relative">
                <div
                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="{{ asset('storage/'. $product->image[0]) }}"
                        alt="Roro Picture"
                        class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="{{ route('product' , ['id' => $product->id]) }} ">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->bin_name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Quantity available : {{ $product->quantity }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">RM {{ $product->price }}</p>
                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </div>
</div>

<!-- End Features -->
@endsection