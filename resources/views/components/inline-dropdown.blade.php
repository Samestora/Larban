@props(['title', 'icon' => null])

<div x-data="{ open: false }" class="w-full">
    <button @click="open = !open"
        class="w-full flex items-center justify-between px-4 py-2 rounded-lg hover:bg-base-300 transition">
        <div class="flex items-center gap-3">
            @if ($icon)
                <i class="fa-solid {{ $icon }} w-4"></i>
            @endif
            <span class="font-medium text-left">{!! $title !!}</span>
        </div>
        <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid text-xs"></i>
    </button>

    <div x-show="open" x-collapse class="mt-2 px-4 space-y-2 text-sm">
        {{ $slot }}
    </div>
</div>
