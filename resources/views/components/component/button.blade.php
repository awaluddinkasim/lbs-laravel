@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false])

<button type="{{ $type }}" class="text-white btn bg-{{ $color }} {{ $block ? 'w-full' : '' }}">
    {{ $label }}
</button>
