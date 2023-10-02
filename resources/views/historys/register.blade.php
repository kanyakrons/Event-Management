@extends('layouts.main')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="flex justify-between items-center mb-4 p-4 r ">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Event Applied</div>
            </div>
            <form id="filterForm" action="{{ route('historys.register') }}" method="get" class="flex items-center space-x-4">
                @csrf
                <label for="filter" class="font-semibold text-sm">Status:</label>
                <select id="filter" name="filter" class="font-semibold text-sm px-4 py-1 border-2 border-indigo-600 text-indigo-600 rounded-full w-24 focus:ring-0">
                    <option value="ALL" {{ request('filter') === 'ALL' ? 'selected' : '' }}>All</option>
                    <option value="WAITING" {{ request('filter') === 'WAITING' ? 'selected' : '' }}>Waiting</option>
                    <option value="ACCEPT" {{ request('filter') === 'ACCEPT' ? 'selected' : '' }}>Accept</option>
                    <option value="REJECT" {{ request('filter') === 'REJECT' ? 'selected' : '' }}>Reject</option>
                </select>
            </form>
        </div>


        <div class="event-container">
            @foreach ($applications as $application)
            <a href="{{ route('historys.registerDetail', ['event' => $application->event]) }}">
                <div class="event-application-item">
                    <div class="event-image">
                        <img src="{{ asset('storage/' . $application->event->image_path) }}" alt="{{ $application->event->name }}">
                    </div>
                    <div class="event-detail">
                        <p class="font-semibold text-violet-700">{{ date('d M Y', strtotime($application->event->date)) }}</p>
                        <h2 class="event-name">{{ $application->event->name }}</h2>
                        <p class="event-location" style="margin-block: 4px">{{ $application->event->province->name }} {{ $application->event->district->name }}</p>
                        <div>
                            <span class="font-semibold ">Status : </span>
                            @if($application->status === "WAITING") <span class="text-black">Waiting</span>
                            @elseif($application->status === "ACCEPT") <span class="text-green-600">Accept</span>
                            @elseif($application->status === "REJECT") <span class="text-red-600">Reject</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <script>
        const filterForm = document.getElementById('filterForm');
        const filterSelect = document.getElementById('filter');

        filterSelect.addEventListener('change', function() {
            filterForm.submit();
        });
    </script>
</body>
</div>
@endsection
