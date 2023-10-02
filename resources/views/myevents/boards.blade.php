@extends('layouts.main')

@section('content')
@include('myevents.sidebar')
<div>
  <div class=" min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black ">
    <div class="h-full ml-14 mt-10 mb-14 md:ml-64">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-center">Event Board</h1>
      </div>
      <div class="grid grid-cols-3 ">
        @foreach ($boards as $index => $board)
        <div class="overflow-auto max-h-[700px] max-w-md mx-5 p-4 bg-white rounded-lg border shadow-md sm:p-8">
          <div class="flex justify-between items-center mb-5 
              @if ($index % 3 == 0) bg-red-400
              @elseif ($index % 3 == 1) bg-yellow-400
              @else bg-green-400 @endif
              rounded-lg border shadow-md sm:p-8">
            <h3 class="text-xl center font-bold leading-none text-gray-900">{{ $board->header }}</h3>
            <a href="{{ route('myevents.create-postit', ['board'=> $board,'event' => $myevent, 'myevent_details' => $myevent_details, 'organizer' => $organizer ] )}}" class="font-medium text-blue-800 hover:bg-blue-800 hover:text-white transition-colors duration-300 rounded-full p-3">ADD</a>
          </div>
          @foreach ($board_details as $board_detail)
          @if ($board_detail->board_header_id == $board->id)
          <div class="shadow-lg rounded-xl group bg-gray-900 p-6 mt-5 lg:p-8 relative overflow-hidden">
            <div class="w-full h-full block ">
                <div class="flex items-center mb-2 py-2">
                    <div class="w-full">
                        <div class="text-blue-800 text-2xl font-medium mb-2 white-space: nowrap; text-overflow: ellipsis;">
                            {{ $board_detail->topic }}
                        </div>
                    </div>
                </div>
                <div class="w-full">
                  <div class="text-gray-200 text-l font-medium mb-2 overflow-hidden">
                    <p class="w-full h-full bg-transparent border-0 focus:outline-none resize-none" readonly>
                      {{ $board_detail->detail }}
                    </p>
                  </div>
                </div>
                <div class="w-full h-2 flex justify-center mt-10 margin-bottom: -1.5rem">
                  <form action="{{ route('myevents.delete_postit', ['board' => $board, 'event' => $myevent,'board_detail'=> $board_detail ,'myevent_details' => $myevent_details, 'organizer' => $organizer] )}}"method="POST" class="mr-5">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-50 transition-all duration-300 hover:scale-110 ">Delete</button>
                  </form>
                  <form action="{{ route('myevents.updatePostit', ['board' => $board, 'event' => $myevent,'board_detail'=> $board_detail ,'myevent' => $myevent, 'organizer' => $organizer] ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="action" value="shift_left" class="text-gray-50 transition-all mr-5 duration-300 hover:scale-110 
                    @if ($index % 3 == 0) opacity-50 cursor-not-allowed
                    @elseif ($index % 3 == 1) 
                    @else @endif">Move Back
                    </button>
                    <button type="submit" name="action" value="shift_right" class="text-gray-50 transition-all duration-300 hover:scale-110 
                      @if ($index % 3 == 0)
                      @elseif ($index % 3 == 1) 
                      @else opacity-50 cursor-not-allowed  @endif ">Move Next
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endif
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>



@endsection