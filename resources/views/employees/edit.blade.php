@extends('partials.page-wrapper', ['title' => 'Employee Info'])

@section('button')
    <a href="{{ route('employees.index') }}">
        <x-primary-button class="bg-red-500 hover:bg-red-600">Back</x-primary-button>
    </a>
@endsection

@section('content')
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Edit Employee') }}
            </h2>
        </header>

        <form action="{{ route('employees.update', $employee->id) }}" method="post" class="mt-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- First Name --}}
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input 
                    id="first_name" 
                    type="text" 
                    name="first_name" 
                    class="mt-1 block w-full"
                    :value="old('first_name', $employee->first_name)"
                    onblur="this.value = this.value.toLowerCase().replace(/\b\w/g, c => c.toUpperCase())"/>
                @error('first_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Last Name --}}
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input 
                    id="last_name" 
                    type="text" 
                    name="last_name" 
                    class="mt-1 block w-full"
                    :value="old('last_name', $employee->last_name)" 
                    onblur="this.value = this.value.toLowerCase().replace(/\b\w/g, c => c.toUpperCase())"/>
                @error('last_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <x-radio-group
                    name="gender"
                    label="Gender"
                    :options="[
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Others' => 'Others',
                    ]"
                    :selected="old('gender', $employee->gender)"
                />
                @error('gender')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Birthday --}}
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full"
                    :value="old('birthday', $employee->birthday)" />
                @error('birthday')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Monthly Salary --}}
            <div>
                <x-input-label for="monthly_salary" :value="__('Monthly Salary')" />
                <x-text-input id="monthly_salary" name="monthly_salary" type="number" step="0.01"
                    class="mt-1 block w-full"
                    :value="old('monthly_salary', $employee->monthly_salary)" />
                @error('monthly_salary')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'employee-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif

                <x-secondary-button
                    onclick="{{ $functions['delete'] ?? 'removeEmployee' }}({{ $employee->id }})"
                    class=" w-auto h-auto text-red-500 hover:text-red-700 gap-2">
                    Delete Employee
                    <i class="fas fa-trash fa-lg"></i>
                </x-secondary-button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    @include('employees.partials.employee-scripts')
@endpush
