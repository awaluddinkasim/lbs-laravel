@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false, 'href' => null])

<button type="{{ $type }}" class="text-white btn bg-{{ $color }} {{ $block ? 'w-full' : '' }}"
    {!! $href ? 'onclick="document.location.href = \'' . $href . '\'"' : '' !!}>
    {{ $label }}
</button>
