@extends('layouts.main')

@section('content')



<div class="">


    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-indigo-600 grid justify-items-center rounded-b-lg">
                    @if ((auth()->user()->image_path))

                    <div class="relative w-40 h-40 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 ">
                        <img type="file" name="image_path" id="image_path" class="relative relative w-40 h-40 rounded-full" src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="Rounded avatar">
                    </div>

                    @else

                    <div class="relative w-40 h-40 overflow-hidden  rounded-full ">
                        <div class="relativew-40 h-40 overflow-hidden  rounded-full ">
                            <img type="file" name="image_path" id="image_path" class="relative w-40 h-40  rounded-full" src="https://cdn4.iconfinder.com/data/icons/top-search-7/128/_user_account_profile_head_person_avatar-512.png">
                        </div>
                    </div>

                    @endif
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->user_name}}</h1>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$user->about}}</p>

                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                <!-- Friends card -->

            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-lg">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2">{{$user->first_name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2">{{$user->last_name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{$user->gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{$user->phone}}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-indigo-600">{{$user->email}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Age</div>
                                <div class="px-4 py-2">{{$user->age}}</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-lg">

                    <div>
                        @if($user->role == 'MEMBER')
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Education</span>
                        </div>
                        <div>
                            <ul class="list-inside space-y-0">
                                <li>
                                    <div class="px-4 py-2 font-semibold text-sm text-indigo-600">
                                        {{$user->faculty}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
                <a href="{{ route('profile.edit', ['user' => $user]) }}">
                    <button class="block w-full text-indigo-600 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <span class="relative group-hover:text-white">Edit Information</span>
                    </button>
                </a>

            </div>
            <!-- End of profile tab -->
        </div>
    </div>
</div>
</div>


@endsection('content')