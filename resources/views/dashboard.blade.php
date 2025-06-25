@extends('partials.page-wrapper', ['title' => 'Dashboard'])

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-6">

    <div class="col-span-1 lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Gender Distribution (Make this 1 column on small, 2 on large) --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 flex flex-col row-span-1 md:row-span-2 ">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Gender Distribution</h2>
            <canvas id="genderChart" height="150"></canvas>
        </div>
        {{-- Male Employees --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-sm font-medium text-gray-500">Male Employees</h2>
            <p class="text-2xl font-semibold text-blue-600">{{ $maleCount }}</p>
        </div>

        {{-- Female Employees --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-sm font-medium text-gray-500">Female Employees</h2>
            <p class="text-2xl font-semibold text-pink-500">{{ $femaleCount }}</p>
        </div>
    </div>

    <div class="col-span-1 lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Average Age --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-sm font-medium text-gray-500">Average Age</h2>
            <p class="text-2xl font-semibold text-green-600">{{ number_format($averageAge, 2) }} yrs</p>
        </div>

        {{-- Total Salary --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-sm font-medium text-gray-500">Total Monthly Salary</h2>
            <p class="text-2xl font-semibold text-indigo-600">₱{{ number_format($totalSalary, 2) }}</p>
        </div>

        {{-- Average Salary --}}
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-sm font-medium text-gray-500">Average Monthly Salary</h2>
            <p class="text-2xl font-semibold text-indigo-600">₱{{ number_format($averageSalary, 2) }}</p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Employees',
                data: [{{ $maleCount }}, {{ $femaleCount }}],
                backgroundColor: ['#3B82F6', '#EC4899'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush