@props([
    'name',
    'label'    => '',
    'options',          // value => label
    'selected' => null, // current selected value
])

<div>
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1 flex space-x-4">
        @foreach($options as $value => $optionLabel)
            <label class="flex items-center">
                <input
                    type="radio"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ (string)$value === (string)$selected ? 'checked' : '' }}
                    {{ $attributes->merge(['class' => 'form-radio']) }}
                >
                <span class="ml-2">{{ $optionLabel }}</span>
            </label>
        @endforeach
    </div>
</div>