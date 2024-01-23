@extends('app')

@section('main')
<div class="relative bg-gradient-to-bl from-lime-100 via-transparent dark:from-green-950 dark:via-transparent">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h1 class="text-4xl font-bold text-center">Your payment has been made! </h1>
        <h1 class="text-xl mt-4 font-semibold text-center">Thank you for renting with us.</h1>

        <img src="{{ asset('image/success.png') }}" class="mx-auto" alt="SVG Image" style="width: 500px;">
    </div>
</div>


@endsection