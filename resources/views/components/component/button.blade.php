@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false])

<div class="my-2">
    <button type="{{ $type }}" class="text-white btn bg-{{ $color }} {{ $block ? 'w-full' : '' }}">
        {{ $label }}
    </button>
</div>
