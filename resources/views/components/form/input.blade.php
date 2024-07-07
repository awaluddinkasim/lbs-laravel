@props(['label', 'type' => 'text', 'id', 'name', 'required' => false])

<div class="mb-3">
    <label for="{{ $id }}"
        class="text-gray-800 text-sm font-medium inline-block mb-2">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="form-input"
        {{ $required ? 'required' : '' }}>
</div>
