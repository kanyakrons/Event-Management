@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="flex justify-between items-center mb-4 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="text-2xl font-semibold">Event Budget</div>
            </div>
            <form id="filterForm" action="{{ route('budgets.index') }}" method="get" class="flex items-center space-x-4">
                @csrf
                <label for="filter" class="font-semibold">Status:</label>
                <select id="filter" name="status" class="px-4 py-1 border rounded w-32" onchange="this.form.submit()">
                    <option value="ALL" {{ request('status') === 'ALL' ? 'selected' : '' }}>All</option>
                    <option value="inprogress" {{ request('status') === 'inprogress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </form>
        </div>

        <div class="budget-container">
            @foreach ($budgets as $budget)
            <a href="{{ route('budgets.show', ['budget' => $budget]) }}">
                <div class="budget-item">
                    <div class="budget-image">
                        <img src="{{ asset('storage/' . $budget->event->image_path) }}" alt="{{ $budget->event->name }}">
                    </div>
                    <div class="budget-detail">
                        <h2 class="text-xl font-semibold">{{ $budget->event->name }}</h2>
                        <div>
                            <div>
                                <span class="font-semibold">สถานะ: </span>
                                @if($budget->status === "inprogress") <span class="text-black">รอดำเนินการ</span>
                                @elseif($budget->status === "completed") <span class="text-green-600">ยืนยัน</span>
                                @elseif($budget->status === "rejected") <span class="text-red-600">ปฏิเสธ</span>
                                @endif
                            </div>
                            <div>
                                <span class="font-semibold">ค่าใช้จ่าย: </span>
                                <span>{{ $budget->cost }} </span>
                            </div>
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
</html>
@endsection