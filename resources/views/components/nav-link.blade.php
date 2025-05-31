@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary dark:border-primary text-sm font-medium leading-5  dark: focus:outline-none focus:border-primary transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5  hover: dark:hover: hover:border-primary dark:hover:border-primary focus:outline-none focus: dark:focus: focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
