@extends('layouts.main')

@section('content')
@include('myevents.sidebar')
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black ">
        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

            <div class="grid grid-cols-2 gap-0">
                <div class="grid-column: 1" style=" display: flex; flex-direction: column; align-items: center;">
                    <div class="event-detail-image">
                        <img src="{{ asset('storage/' . $myevent_details->image_path) }}">
                    </div>
                </div>
                <div class="grid grid-rows-2">
                    <div class="event-detail-myevents border shadow-md text-base">
                        <div class="mb-4">

                            <label class="block text-gray-700 text-sm font-bold mb-2" for="eventName">
                                Event Name : {{ $myevent_details->name }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="eventDetail">
                                Event Detail : {{ $myevent_details->detail }}
                            </label>
                        </div>

                        <a href=" {{ route('myevents.edit-event',['organizer' => $organizer, 'myevent' => $myevent]) }}"
                            class="shadow-lg bg-teal-500 hover:bg-teal-400 appearance-none border rounded-lg w-full p-2 text-white text-sm font-bold leading-tight cursor-pointer" method="POST" >
                            Edit Event
                        </a>
                    </div>
                    <div class="event-detail-myevents border shadow-md text-base">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Address : {{ $myevent_details->address }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Province : {{ $province }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                District : {{ $district }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Subdistrict : {{ $subdistrict }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Location : {{ $myevent_details->location_detail }}
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Upcoming : {{ $myevent_details->date }}
                            </label>
                        </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
