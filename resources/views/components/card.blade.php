@props(['title' => null])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if ($title)
        <h3 style="margin-top:0">{{ $title }}</h3>
    @endif
    {{ $slot }}
</div>