
@props([])

@php

@endphp

<article class="alert alert-{{ $type }} {{ $styles }} {{ $class }}">
    <strong>{{ $title ?? 'Alerta' }}</strong>
    <p>{{ $slot }}</p>
</article>

