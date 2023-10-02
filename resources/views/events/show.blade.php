@extends('layouts.main')

@section('content')
    <div class="mx-auto py-10 px-10 grid grid-cols-2">
        <div class="grid-column: 1" style=" display: flex; flex-direction: column; align-items: center;">
            <div class="event-detail-image">
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}">
            </div>
        </div>

        <div class="grid-column:2">
            <div class = "event-detail-box-white">
                <h1 class="font-semibold text-xl "> {{ $event->name }} </h1>
            </div>

            <div class="event-detail-box-white">
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://img.icons8.com/?size=512&id=6Z5IUAh18Fuc&format=png"></span>
                    <span class="detail-info ">{{ date('D d F Y', strtotime($event->date)) }}</span>
                </div>
                <div class="detail-container">
                    <span class="detail-icon"><img src="https://img.icons8.com/?size=512&id=c0kUjxdWTRsk&format=png"></span>
                    <span class="detail-info ">
                        <p>{{ $event->address }} {{ $event->province->name }} {{ $event->district->name }} {{ $event->subdistrict->name }}</p>
                        <p>{{ $event->location_detail }}</p>
                    </span>
                </div>
            </div>
            <div class="event-detail-box-white">
                <p>{{ $event->detail }}</p>
            </div>

            @can('apply', $event)
                <div style="margin-block: 50px">
                    <a href="{{ route('application.form', ['event' => $event]) }}">
                        <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                            <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                            <span class="relative group-hover:text-white">Apply</span>
                        </button>
                    </a>
                </div>
            @endcan
        </div>
    </div>
@endsection
