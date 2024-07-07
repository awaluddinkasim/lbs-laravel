@props(['label', 'id', 'name', 'required' => false])

<div class="mb-3">
    <label for="{{ $id }}"
        class="text-gray-800 text-sm font-medium inline-block mb-2">{{ $label }}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-input" {{ $required ? 'required' : '' }}>{{ $slot }}</textarea>
</div>
