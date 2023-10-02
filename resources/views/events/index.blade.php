@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
    
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div class="max-w-2xl mx-auto my-auto pt-6" style="margin-block: 10">
        <div id="default-carousel" class="relative" data-carousel="static">
            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                @foreach ($lastThreeEvents as $event)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $event->image_path) }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2">
                    </div>
                @endforeach
            </div>


            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>

        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    </div>


    <div class="container">

        <div class="flex justify-between items-center mb-4 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Upcoming Events</div>
            </div>
            <form id="filterForm" action="{{ route('event') }}" method="get" class="flex items-center space-x-4">
                @csrf
                <label for="sort" class="font-semibold text-sm">Sort by :</label>
                <select id="sort" name="sort" class="font-semibold text-sm px-4 py-1 border-2 border-indigo-600 text-indigo-600 rounded-full w-24 focus:ring-0">
                    <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Oldest</option>
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest</option>
                </select>

                <label for="startDate" class="font-semibold text-sm">Start Date :</label>
                <input type="date" id="startDate" name="start_date" class="font-semibold text-sm px-2 py-1 border-2 border-indigo-600 text-indigo-600 rounded-full focus:ring-0 " value="{{ request('start_date') }}" min="{{ date('Y-m-d') }}">

                <label for="endDate" class="font-semibold text-sm ">End Date :</label>
                <input type="date" id="endDate" name="end_date" class="font-semibold text-sm px-2 py-1 border-2 border-indigo-600 text-indigo-600 rounded-full focus:ring-0 " value="{{ request('end_date') }}" min="{{ date('Y-m-d') }}">

                <input type="submit" style="display: none;">
            </form>
        </div>

        <div class="event-container">
            @foreach ($events as $event)
            <a href="{{ route('events.show', ['event' => $event]) }}">
                <div class="event-item">
                    <div class="event-image">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}">
                    </div>
                    <div class="event-detail">
                        <p class="font-semibold text-violet-700">{{ date('d M Y', strtotime($event->date)) }}</p>
                        <h2 class="event-name">  {{ $event->name }}</h2>
                        <p class="event-location" style="margin-block: 4px">{{ $event->province->name }} {{ $event->district->name }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <script>
        const filterForm = document.getElementById('filterForm');
        const sortSelect = document.getElementById('sort');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');

        sortSelect.addEventListener('change', function() {
            filterForm.submit();
        });
        startDateInput.addEventListener('change', function() {
            filterForm.submit();
        });
        endDateInput.addEventListener('change', function() {
            filterForm.submit();
        });
    </script>

</body>
</html>
@endsection
