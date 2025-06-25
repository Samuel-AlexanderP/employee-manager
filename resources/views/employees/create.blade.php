@extends('partials.page-wrapper', ['title' => 'New Employee'])

@section('button')
    <a href="{{ route('employees.index') }}">
        <x-primary-button class="bg-red-500 hover:bg-red-600">Back</x-primary-button>
    </a>
@endsection

@section('content')
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('New Employee') }}
            </h2>
        </header>

        <form action="{{ route('employees.store') }}" method="post" class="mt-6 space-y-6 ">
            @csrf
            {{-- First Name --}}
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" class="mt-1 block w-full" />
            </div>
            {{-- Last Name --}}
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" class="mt-1 block w-full" />
            </div>
            {{-- gender selector --}}
            <div>
                <x-radio-group
                    name="gender"
                    label="Gender"
                    :options="[
                        'Male'   => 'Male',
                        'Female' => 'Female',
                        'Others' => 'Others',
                    ]"
                />
            </div>
            {{-- birthday --}}
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" />
            </div>
            {{-- monthly salary --}}
            <div>
                <x-input-label for="monthly_salary" :value="__('Monthly Salary')" />
                <x-text-input
                    id="monthly_salary"
                    name="monthly_salary"
                    type="number"
                    step="0.01"
                    class="mt-1 block w-full"
                    :value="old('monthly_salary')"
                />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
@endsection
