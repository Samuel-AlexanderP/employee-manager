<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Employee Summary</h1>
                    <p>Male Employees: {{ $maleCount }}</p>
                    <p>Female Employees: {{ $femaleCount }}</p>
                    <p>Average Age: {{ number_format($averageAge, 2) }} years</p>
                    <p>Total Monthly Salary: ₱{{ number_format($totalSalary, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
