@props([
    'headers' => [],
    'rows' => [],
    'columns' => [],
    'tableId' => 'dataTable',
])

<table id="{{ $tableId }}" class="display text-center">
    <thead class="text-center">
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-2 border {{ $header['class'] ?? '' }}">
                    <p class="{{ $header['class'] ?? '' }}">
                        {{ $header['label'] }}
                    </p>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($columns as $col)
                    @php
                        $value = $col['value'] ?? null;
                        $class = $col['class'] ?? '';
                    @endphp
                    <td class="{{ $class }}">
                        {!! is_callable($value) ? $value($row) : data_get($row, $value) !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@php
    $columnDefs = [];
    foreach ($headers as $index => $header) {
        if (isset($header['orderable']) && $header['orderable'] === false) {
            $columnDefs[] = "{ targets: $index, orderable: false }";
        }
    }
@endphp

@push('scripts')
<script>
    $(function () {
        $('#{{ $tableId }}').DataTable({
            columnDefs: [
                {!! implode(',', $columnDefs) !!}
            ],
            stateSave: true
        });
    });
</script>
@endpush
