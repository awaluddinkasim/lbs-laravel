@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false])

<button type="{{ $type }}"
    class="btn bg-{{ $color }}/25 text-{{ $color }} hover:bg-{{ $color }} hover:text-white {{ $block ? 'w-full' : '' }}">
    {{ $label }}
</button>
