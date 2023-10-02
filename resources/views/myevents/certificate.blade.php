@extends('layouts.main')

@section('content')
@include('myevents.sidebar')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black ">


    <form action="{{ route('myevents.uploadImage') }}" method="POST" enctype="multipart/form-data"
    class="event-certificate border shadow-md text-base mx-auto">
        @csrf

        <input type="hidden" name="myevent" value="{{ $myevent }}">

        <label class="grid grid-rows-2 gap-y-2"title="Click to upload" for="certificate_button"> <!-- Updated ID -->
            <div class="group/img shadow-md border-grey border animate-[fadeIn_2s] event-image">
                <img type="file" name="preview" id="preview" class="w-full h-full mb-8object-cover opacity-90 group-hover/img:opacity-100"
                    src="#">
            </div>
            <input hidden="" type="file" name="certificate" id="certificate_button" onchange="loadFile(event)"> <!-- Updated ID -->
            <div class="justify-self-center"> <x-primary-button>Upload</x-primary-button></div>
        </label>
    </form>

                

</div>
@endsection

<script>
    var loadFile = function(event) {
        var input = event.target;
        var file = input.files[0];
        var type = file.type;
        var output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        };
    };
</script>
