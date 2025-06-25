@props([
    'buttons' => [],
    'id' => null, // make sure you pass $id as a prop too
    'functions' => [],
])

@if (in_array('edit', $buttons))
    <button
        onclick="{{ $functions['edit'] ?? 'editFunc' }}({{ $id }})"
        class="px-2 text-blue-500 hover:text-blue-700">
        <i class="fas fa-edit fa-lg"></i>
    </button>
@endif

@if (in_array('delete', $buttons))
    <button
        onclick="{{ $functions['delete'] ?? 'deleteFunc' }}({{ $id }})"
        class="px-2 text-red-500 hover:text-red-700">
        <i class="fas fa-trash fa-lg"></i>
    </button>
@endif