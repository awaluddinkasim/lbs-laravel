@props(['label', 'type' => 'text', 'id', 'name', 'required' => false, 'readonly' => false, 'isNumber' => false])

@push('scripts')
    @if ($isNumber)
        <script src="{{ asset('assets/libs/autonumeric/autoNumeric.min.js') }}"></script>
        <script>
            new AutoNumeric('#{{ $id }}', {
                allowDecimalPadding: false
            });
        </script>
    @endif
@endpush

<div class="mb-3">
    <label for="{{ $id }}"
        class="inline-block mb-2 text-sm font-medium text-gray-800">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="form-input"
        {{ $readonly ? 'readonly' : '' }} {{ $required ? 'required' : '' }}>
</div>
