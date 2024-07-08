@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false, 'href' => null])

<button type="{{ $type }}"
    class="btn border-{{ $color }} text-{{ $color }} hover:bg-{{ $color }} hover:text-white {{ $block ? 'w-full' : '' }}"
    {!! $href ? 'onclick="document.location.href = \'' . $href . '\'"' : '' !!}>
    {{ $label }}
</button>
