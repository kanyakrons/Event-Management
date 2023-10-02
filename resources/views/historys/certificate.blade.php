@extends('layouts.main')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<div class="container">
    <div class="text-2xl font-semibold text-center">My Certificates</div>
    {{-- loop --}}
    <div class="mt-auto mx-20 grid gap-x-10 gap-y-10 grid-cols-3 pt-6">
        @foreach ($certificates as $certificate)
            <div class="group/img shadow-md border-black border animate-[fadeIn_2s]">
                <img class="w-full h-full object-cover opacity-90 group-hover/img:opacity-100"
                src="{{ asset('storage/' . $certificate->certificate) }}">
            </div>
        @endforeach
    </div>
</div>

@endsection
