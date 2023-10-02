@extends('layouts.main')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <div class="container">
        <div class="text-2xl font-semibold text-grey-700">My Organizer</div>
        <div class="event-container">
            @foreach ($organizers as $organizer)
                <a href="{{ route('myevents', ['organizer' => $organizer]) }}" class="event-item cursor-pointer">
                    <div class="event-image">
                        <img src="https://cdn.discordapp.com/attachments/1130699942311247915/1143290643389628549/Organizer.png">
                    </div>
                    <div class="event-detail">
                        <label class="text-base font-bold text-center ">{{ $organizer->name }}</label>
                    </div>
                </a>
            @endforeach

            <a href=" {{ route('myorgs.create-orgs')}}" class="event-item justify-center items-center"
                method="POST" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            <p class="text-sm font-bold"> Create Organizer</p>
            </a>
        </div>
    </div>
@endsection
