@extends('layouts.main')

@section('content')
    <div class="mx-auto py-10 px-10 grid grid-cols-2">
        <div class="grid-column: 1" style=" display: flex; flex-direction: column; align-items: center;">
        <div class="event-detail-image">
            <img src="{{ asset('storage/' . $budget->event->image_path) }}" alt="{{ $budget->event->name }}">
        </div></div>

        <div style="grid-column:2">
                <div class = "event-detail-box-white">
                    <h1 class="font-semibold text-xl"> {{ $budget->event->name }} </h1>
                </div>

                <div class = "event-detail-box-white">
                    <div class="detail-container">
                        <span class="detail-icon"><img src="https://img.icons8.com/?size=512&id=6Z5IUAh18Fuc&format=png" width="20"></span>
                        <span class="detail-info"><p>{{ date('D d F Y g:i:s A', strtotime($budget->event->date)) }}</p></span>
                    </div>
                    <div class="detail-container">
                        <span class="detail-icon"><img src="https://img.icons8.com/?size=512&id=c0kUjxdWTRsk&format=png" width="20"></span>
                        <span class="detail-info"><p>{{ $budget->event->address }} {{ $budget->event->province->name }} {{ $budget->event->district->name }} {{ $budget->event->subdistrict->name }}</p></span>
                    </div>
                    <p style="margin-left:30px">{{ $budget->event->location_detail }}</p>
                </div>

                <div class="event-detail-box-white">
                    <p>{{ $budget->event->detail }}</p>
                </div>
                <div class="event-detail-box-white" >
        <div class="mx-auto flex justify-left">
            <div class="font-semibold">Budget</div>
        </div>

        <div style="margin-block:10px">
            <span class="font-semibold">สถานะ : </span>
            @if($budget->status === "inprogress") <span>รอดำเนินการ</span>
            @elseif($budget->status === "completed") <span>ยืนยัน</span>
            @elseif($budget->status === "rejected") <span>ปฏิเสธ</span>
            @endif
        </div>
        <div style="margin-block:10px">
            <span class="font-semibold">ค่าใช้จ่าย : </span>
            <span>{{ $budget->cost }} บาท</span>
        </div>

        @can('editStatus', $budget)
        <div class="mx-auto flex justify-center" style="margin-block:30px">
            <form action="{{ route('budgets.update-status', ['budget' => $budget]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" value="completed" name="status" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                    <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                    <span class="relative group-hover:text-white">accept</span>
                </button>
                <button type="submit" value="rejected" name="status" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" style="background-color: rgb(31, 41, 55); color: white;">
                    <div class="absolute inset-0 w-3 bg-purple-700 transition-all duration-250 ease-out group-hover:w-full"></div>
                    <span class="relative group-hover:text-white">reject</span>
                </button>
            </form>
        </div>
        @endcan
    </div>
            </div>
        </div>
    </div>


@endsection
