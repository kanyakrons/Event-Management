@extends('layouts.main')

@section('content')
<head>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 </head>
<div class="container">
    <div class="text-2xl font-semibold text-center">Create New Event</div>
    <form action="{{ route('myevents.storeEvent',['organizer' => $organizer, 'myevents' => $myevents]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="create-container ">
                    <div class="max-h-full w-60 mx-14 shadow-md border-grey-300 border flex flex-col justify-center items-center rounded-2xl hover:bg-gray-300 h-96" id="imageContainer">
                        <input required type="file" accept="image/*" class="hidden" id="image" name="image">
                        <label for="image" class="cursor-pointer w-full h-full flex flex-col items-center justify-center text-l font-bold" id="label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Event Picture
                        </label>
                        <img id="imagePreview" class="hidden w-full h-full object-cover rounded-2xl">
                    </div>
                    @error('image')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                    @enderror


                <div class="ml-20">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eventname">
                                Event Name
                                </label>
                                <input required class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600"
                                id="eventname" name="eventname" type="text" placeholder="Event Name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eventdetail">
                                Event Detail
                                </label>
                                <textarea name="eventdetail" id="eventdetail" type="text" rows="4"
                                class="block shadow appearance-none text-gray-700 rounded w-80 h-40 py-2 px-3 border-gray-300 focus:ring-violet-600"
                                placeholder="Write your event detail here..."></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eventdate">
                                Event Date
                                </label>
                                <input required class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600"
                                id="eventdate" name="eventdate" type="datetime-local" placeholder="Event Date">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eventbudget">
                                Event Budget
                                </label>
                                <input required class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600"
                                id="eventbudget" name="eventbudget" type="number" placeholder="Event Budget">
                            </div>
                        </div>

                        <div class="ml-40">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eventaddress">
                                    Address
                                </label>
                                <input required class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600"
                                id="eventaddress" name="eventaddress" type="text" placeholder="Address">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="province">
                                    Province
                                </label>
                                <select class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600 cursor-pointer"
                                name="province" id="province">
                                <option value="" disabled selected>Select Province</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="district">
                                    District
                                </label>
                                <select class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600 cursor-pointer"
                                name="district" id="district">
                                    <option value="" disabled selected>Select District</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="subdistrict">
                                    Subdistrict
                                </label>
                                <select class="shadow appearance-none border-gray-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:ring-violet-600 cursor-pointer"
                                name="subdistrict" id="subdistrict">
                                    <option value="" disabled selected>Select Subdistrict</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="addressdetail">
                                    More Address
                                </label>
                                <textarea id="addressdetail" name="addressdetail" type="text" rows="4"
                                class="block shadow appearance-none text-gray-700 rounded w-80 h-20 py-2 px-3 border-gray-300 focus:ring-violet-600"
                                placeholder="Address Detail"></textarea>

                            </div>

                            <input class="shadow-lg bg-teal-500 hover:bg-teal-400 appearance-none border rounded w-80 py-2 px-3 text-gray-700 text-sm font-bold leading-tight cursor-pointer"
                        id="createSubmit" type="submit">

                        </div>
            </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     const imageInput = document.getElementById('image');
    const imageContainer = document.getElementById('imageContainer');
    const imagePreview = document.getElementById('imagePreview');
    const label = document.getElementById('label');

    imageInput.addEventListener('change', function (event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            const imageUrl = URL.createObjectURL(selectedFile);
            imagePreview.src = imageUrl;
            imagePreview.classList.remove('hidden');
            label.classList.add('hidden');
            imageInput.classList.add('hidden');
        }
    });

    imageContainer.addEventListener('click', function () {
        if (!imagePreview.classList.contains('hidden')) {
            // Clicking on the image again will trigger a new image upload
            imageInput.click();
        }
    });

    $(document).ready(function() {
        $('#province').on('change', function() {
            var selectedProvinceId = $(this).val();

            $.ajax({
                url: '{{ route('myevents.getDistrict') }}',
                type: 'POST',
                data: {
                    province_id: selectedProvinceId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var districtsSelect = $('#district');
                    var subdistrictSelect = $('#subdistrict');
                    subdistrictSelect.empty();
                    districtsSelect.empty();

                    districtsSelect.append($('<option disabled selected></option>').val('').text('Select District'));
                    subdistrictSelect.append($('<option disabled selected></option>').val('').text('Select Subdistrict'));

                    $.each(response.districts, function(key, district) {
                        districtsSelect.append($('<option></option>').val(district.id).text(district.name));
                    });

                }
            });
        });
        $('#district').on('change', function() {
            var selectedDistrictId = $(this).val();

            $.ajax({
                url: '{{ route('myevents.getSubdistrict') }}',
                type: 'POST',
                data: {
                    district_id: selectedDistrictId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var subdistrictSelect = $('#subdistrict');
                    subdistrictSelect.empty();

                    subdistrictSelect.append($('<option disabled selected></option>').val('').text('Select Subdistrict'));

                    $.each(response.subdistricts, function(key, subdistrict) {
                        subdistrictSelect.append($('<option></option>').val(subdistrict.id).text(subdistrict.name));
                    });

                }
            });
        });
    });
</script>

@endsection
