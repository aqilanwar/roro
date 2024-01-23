@extends('app')

@section('main')
<div class="relative bg-gradient-to-bl from-lime-100 via-transparent dark:from-green-950 dark:via-transparent">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h1 class="text-4xl font-bold text-center">Payment Error! </h1>
        <h1 class="text-xl mt-2 font-semibold text-center">Sorry, there was an error processing your payment.</h1>

        <img src="{{ asset('image/failed.png') }}" class="mt-4 mx-auto" alt="SVG Image" style="width: 500px;">
    </div>
</div>


@endsection