@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false])

<button type="{{ $type }}"
    class="btn border-{{ $color }} text-{{ $color }} hover:bg-{{ $color }} hover:text-white {{ $block ? 'w-full' : '' }}">
    {{ $label }}
</button>
