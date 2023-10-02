@extends('layouts.main')

@section('content')
@include('myevents.sidebar')

<div>
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black ">
        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

            <!-- applicants -->
            <div class="max-w-2xl mx-auto">

                <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 ">
                    <div class="flex justify-between items-center mb-4">
                        <h1 >APPLICANTS </h1>
                        <a href="{{ route('myevents.applicants', ['event' => $myevent,'myevent' => $myevent, 'organizer' => $organizer,'status' => 'WAITING']) }}" class="text-blue-500">WAITING</a>
                        <a href="{{  route('myevents.applicants', ['event' => $myevent,'myevent' => $myevent, 'organizer' => $organizer,'status' => 'ACCEPT']) }}" class="text-green-500">ACCEPT</a>
                    </div>

                    <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 ">
                        @foreach ($applicants as $applicant)
                        @if(($applicant->status == $status))
                        <a href="{{ route('application.verify', ['applicant' => $applicant['id'], 'event' => $myevent, 'myevent' => $myevent,'organizer' => $organizer]) }}">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4 text-blue-600">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' .$applicant->user->image_path ) }}" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate ">
                                            {{$applicant->user->first_name}}
                                            {{$applicant->user->last_name}}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate ">
                                            {{$applicant->user->email}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                        {{$applicant->status}}
                                    </div>
                                </div>
                            </li>
                        </a>
                        @endif
                        @endforeach

                    </ul>
                </div>
                </div>
                
            </div>
        </div>
        <!-- applicants -->

    </div>
</div>
</div>

@endsection
