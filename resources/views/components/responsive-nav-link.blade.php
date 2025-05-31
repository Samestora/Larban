@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary dark:border-primary text-start  font-medium  dark: bg-base-100 dark:bg-base focus:outline-none focus: dark:focus: focus:bg-primary dark:focus:bg-primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start  font-medium  dark: hover: dark:hover:text-primary hover:bg-base-50 dark:hover:bg-primary-300 hover:border-primary-300 dark:hover:border-primary focus:outline-none focus: dark:focus: focus:bg-base-200 dark:focus:bg-base-100 focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
