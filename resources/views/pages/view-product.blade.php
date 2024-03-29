@extends('app')

@section('main')
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
                        <p class="mt-1 text-sm text-gray-500">Quantity : {{ $product->quantity }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">RM {{ $product->price }}</p>
                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </div>
</div>
@endsection

