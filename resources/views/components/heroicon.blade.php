@props([
    'name',
])

@php
    $safe = preg_replace('/[^a-z0-9-]/', '', str_replace('_', '-', (string) $name));
    $path = resource_path('views/components/heroicons/'.$safe.'.svg');
    $raw = is_readable($path) ? file_get_contents($path) : '';
    $inner = '';
    if ($raw !== '') {
        $inner = preg_replace('/^<svg\b[^>]*>/', '', $raw, 1);
        $inner = preg_replace('/<\/svg>\s*$/', '', $inner, 1);
    }
@endphp
@if ($inner !== '')
    <svg
        {{ $attributes->merge([
            'xmlns' => 'http://www.w3.org/2000/svg',
            'fill' => 'none',
            'viewBox' => '0 0 24 24',
            'stroke-width' => '1.5',
            'stroke' => 'currentColor',
            'aria-hidden' => 'true',
        ]) }}
    >{!! trim($inner) !!}</svg>
@endif
