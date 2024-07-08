@props(['label', 'type' => 'button', 'color' => 'primary', 'block' => false, 'href' => null])

<div class="my-2">
    <button type="{{ $type }}" class="text-white btn bg-{{ $color }} {{ $block ? 'w-full' : '' }}"
        {!! $href ? 'onclick="document.location.href = \'' . $href . '\'"' : '' !!}>
        {{ $label }}
    </button>
</div>
