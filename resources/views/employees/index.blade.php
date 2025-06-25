@extends('partials.page-wrapper', ['title' => 'Employees'])

@section('content')
    {{-- New Employee Button --}}
    <div class="flex justify-start mb-4">
        <a href="{{ route('employees.create') }}"
            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">New Employee</a>
    </div>
    {{-- Employee List --}}
    <div>
        <x-data-table
            table-id="employee_tbl"
                    :headers="[
                        ['label' => 'First Name', 'class' => 'text-left'],
                        ['label' => 'Last Name', 'class' => 'text-left'],
                        ['label' => 'Age', 'class' => 'text-right'],
                        ['label' => 'Salary', 'class' => 'text-right'],
                        ['label' => 'Action', 'class' => 'text-center', 'orderable' => false],
                    ]"
                    :rows="$employees"
                    :columns="[
                        ['value' => 'first_name', 'class' => 'text-left'],
                        ['value' => 'last_name', 'class' => 'text-left'],
                        ['value' => 'age', 'class' => 'text-right'],
                        ['value' => 'monthly_salary', 'class' => 'text-right'],
                        [
                            'value' => fn($employee) => view('components.action-buttons', [
                                'id' => $employee->id,
                                'buttons' => ['edit', 'delete'],
                                'functions' => [
                                    'edit' => 'editEmployee',
                                    'delete' => 'removeEmployee'
                                ]])->render(),
                        ],
                    ]"
            />
    </div>
@endsection

@push('scripts')
    @include('employees.partials.employee-scripts')
@endpush