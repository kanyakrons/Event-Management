@extends('layouts.main')
@section('content')
@include('myevents.sidebar')
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black" >
<div class="h-full ml-14 mt-14 mb-10 md:ml-64 ">
    <div class="max-w-2xl mx-auto">
        <div class="p-4 bg-white rounded-lg border shadow-md sm:p-1">
        <div class="mx-auto py-10 px-10 grid grid-cols-2 gap-6">
            <div class="w-full flex justify-center text-gray-600 mb-3">
                <img src="{{ asset('storage/' . $applicant->user->image_path) }}">
            </div>
            <div>
                <!-- Author: FormBold Team -->
                <!-- Learn More: https://formbold.com -->
                <div class="mx-auto w-full max-w-[550px]">
                <form action="{{ route('application.update', ['applicant' => $applicant['id'], 'event' => $myevent['id'] , 'myevent'=>$myevent ,'organizer' => $organizer ]) }}" method="POST">
                        @csrf
                        <div class="-mx-3 flex">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="sm:col-span-3">
                                    <x-input-label for="name" :value="__('First name')" />
                                    <div class="mt-2">
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  value="{{$applicant->user->first_name}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="sm:col-span-3">
                                    <x-input-label for="name" :value="__('Last name')" />
                                    <div class="mt-2">
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  value="{{$applicant->user->last_name}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4"></div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  value="{{$applicant->user->email}}" />

                        </div>
                        <div class="flex mb-4"></div>
                        <div>
                            <x-input-label for="Faculty" :value="__('Faculty')" />
                            <x-text-input id="Faculty" name="Faculty" type="text" class="mt-1 block w-full"  value="{{$applicant->user->faculty}}" />

                        </div>
                        <div class="flex mb-4"></div>
                        <div>
                            <x-input-label for="Age" :value="__('Age')" />
                            <x-text-input id="Age" name="Age" type="text" class="mt-1 block w-full"  value="{{$applicant->user->age}} years old" />

                        </div>
                        <div class="flex mb-4"></div>
                        <div>
                            <x-input-label for="Phone" :value="__('Phone')" />
                            <x-text-input id="Phone" name="Phone" type="text" class="mt-1 block w-full"  value="{{$applicant->user->phone}}" />

                        </div>




                        <div class="flex mb-8"></div>
                        <div class="flex justify-center">
                            @if(($applicant->status == 'WAITING'))
                            <div class="flex justify-center space-x-4">
                                <button type="submit" name="action" value="accept" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Accept</button>
                                <button type="submit" name="action" value="reject" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Reject</button>
                            </div>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection('content')
