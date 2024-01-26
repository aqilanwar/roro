@extends('app')

@section('main')
<div class="relative overflow-hidden">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('image/hero-1.jpg') }}" alt="background image" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-black opacity-20"></div>
  
        <!-- Content Container -->
        <div class="relative z-10 text-center text-white">
            <div class="max-w-[800px]">
                <h1 class="text-3xl sm:text-4xl md:text-5xl mb-8">Welcome to our user friendly <br> KSR Ro-ro Bin Management System </h1>

            </div>
            <a href="/product" class="button mt-8 py-3 px-6 bg-transparent border border-white text-white rounded-md transition-all duration-300 ease-in-out hover:bg-opacity-75 hover:text-gray-900 hover:border-gray-900">Book now</a>
  
        </div>
    </div>
  </div>
<!-- End Hero -->
<!-- Profile -->
<div class="my-6 mx-auto max-w-[1200px] p-8">
    <h1 class="text-4xl font-bold text-center">KSR Ro-ro Bin Management System</h1>
    <p class="text-lg mt-2 font-medium text-gray-600 text-center">Your number 1 RoRo partner.</p>

    <div class="xs:flex-row md:flex mt-8 md:p-4">
        <div class="xs:w-full md:w-1/2 md:p-4 order-1">
            <h1 class="text-2xl font-bold text-center">About Us</h1>
            <p class="mt-8 text-justify leading-loose">
                Our page introduces KS Recycle Resources (KSR) and our commitment to revolutionizing waste management with the KSR RO-RO Bin Management System. We're dedicated to streamlining bin bookings, enhancing tracking capabilities, and ensuring a seamless user experience for administrators, employees, and customers. Our focus on quality, innovation, and customer satisfaction drives us to deliver efficient and reliable solutions in waste management.            </p>
        </div>
        <div class="xs:w-full md:w-1/2 md:p-4 flex items-center drop-shadow-lg justify-center">
            <img class="rounded-xl" src="{{ asset('image/large-1.jpg') }}" alt="roro" loading="lazy">
        </div>
    </div>
</div>
<!-- End Profile -->
<!-- Servis -->
<div class="my-6 mx-auto max-w-[1200px] p-8">
    <h1 class="text-4xl font-bold text-center">Why book with us?</h1>
    <p class="text-lg mt-2 font-medium text-gray-600 text-center">We provide the best renting RoRo service in Malaysia!</p>

    <div class="xs:flex-row md:flex mt-8 md:p-4">
        <div class="xs:w-full md:w-1/2 md:p-4 flex items-center justify-center drop-shadow-lg order-2">
            <img class="rounded-xl" src="{{ asset('image/large-2.jpg') }}" alt="Roro" loading="lazy">
        </div>
        <div class="xs:w-full md:w-1/2 md:p-4 justify-center flex items-center">
            <div class="mt-3">
                <p class="mt-4 text-justify">
                    KSR RO-RO Bin Management System represents our dedication to redefining waste management practices. Our system is meticulously designed to simplify the process of managing RO-RO bins, offering seamless booking functionalities, real-time tracking, and a user-centric interface. At KSR, we prioritize efficiency, accuracy, and user satisfaction. Our aim is to empower businesses and individuals to manage their waste disposal needs effortlessly, contributing to a cleaner and more sustainable environment. Join us in embracing innovative solutions for smarter waste management.                </p>
            </div>

        </div>

    </div>
</div>

<!-- End Servis -->
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h1 class="text-4xl font-bold text-center">Our best products</h1>
        <p class="text-lg mt-2 font-medium text-gray-600 text-center">Fully customizable size to match your needs.</p>

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
<div class="relative flex items-center justify-center min-h-[50vh]">
    <img class="absolute w-full h-full object-cover max-h-[50vh]" src="{{ asset('image/large-2.jpg') }}" alt="background image">
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <div class="absolute z-10 text-white text-center">
        <h1 class="md:text-4xl mb-8">Book now! </h1>
        <a href="/product" class="button mt-8 py-3 px-6 bg-transparent border border-white text-white rounded-md transition-all duration-300 ease-in-out hover:bg-opacity-75 hover:text-gray-900 hover:border-gray-900">View product</a>

    </div>
</div>


<!-- End Features -->
@endsection