@extends('layouts.main')
@section('content')
<head>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 </head>
 <div class="container">
    <div class="w-full inline-flex">
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto h-52 lg:w-1/2">
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-700">Organizer Name</label>
                <input required type="text" id="nameInput" name="name" placeholder="Insert name" class="border border-gray-300 shadow p-2 w-full rounded mb- focus:ring-indigo-600"
                    value="{{ $organizer->name }}">
            </div>
            <div class="relative" id="container-1">
                <div class="absolute z-10 inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                </div>
                <div class="relative w-full">
                    <input type="text" placeholder="example@email" id="inputMember"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 :bg-gray-700 ">
                    <label class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full pl-10 :bg-gray-700"></label>
                        <button type="button" id="addButton"
                                class="absolute top-0 right-0 p-2.5 h-full text-sm font-medium text-white bg-indigo-700 rounded-r-lg border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white p-10 rounded-lg shadow w-1/2 ml-20 " id="container-2">
            <div class="grid grid-rows-2 gap-4">
            <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg w-full mx-auto mt-auto justify-items-center ">
                <div class="bg-indigo-600 py-2 px-4">
                    <h2 class="font-semibold text-white">Member List </h2>
                </div>
                <ul class="divide-y divide-gray-200">
                    <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                        <div class="flex-1" id="membersContainer">
                            <h3 class="font-bold text-gray-700">{{ $user->user_name }}</h3>
                            <p class="text-gray-600 text-base">{{ $user->email }}</p>
                            <form action="{{ route('myevents.deleteEvent', ['organizer' => $organizer]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="shadow-lg bg-red-500 hover:bg-red-400 appearance-none border rounded w-full p-2 text-gray-700 text-sm font-bold leading-tight cursor-pointer">
                                    Delete Event
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div> 
            <a id="submitButton" href="{{ route('myorgs.myorgs') }}"
                class="justify-items-center shadow-lg bg-teal-500 hover:bg-teal-400 appearance-none border rounded w-full h-10 p-3 text-gray-700 text-center text-sm font-bold leading-tight cursor-pointer hidden">
            Submit
            </a> 
            <form action="{{ route('myevents.deleteEvent', ['organizer' => $organizer]) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="shadow-lg bg-red-500 hover:bg-red-400 appearance-none border rounded w-full p-2 text-gray-700 text-sm font-bold leading-tight cursor-pointer">
                    Delete Event
                </button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let org_id
    let members = []
    $(document).ready(function() {
        $('#addButton').on('click', function() {
            var value = $('#inputMember').val(); ;
            $.ajax({
                url: '{{ route('myorgs.orgs-member') }}',
                type: 'POST',
                data: {
                    id: org_id,
                    name: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.user.user_name, response.user.email);
                    $('#membersContainer').append(
                        '<h3 class="font-bold text-gray-700">' + response.user.user_name + '</h3>' +
                        '<p class="text-gray-600 text-base">' + response.user.email + '</p>'
                    );

                    $('#inputMember').val('');
                },
                error: function(response) {
                    $('#inputMember').val('');
                }
            });
        });
    });


</script>
@endsection