<div class="flex justify-between items-center h-16 w-full">
    <div class="flex-1">
        {{ $header }}
    </div>

    <div class="flex items-center gap-2">
        <x-mary-theme-toggle darkTheme="Moonlight" lightTheme="Bones" class="btn btn-circle btn-ghost" />

        <div class="lg:hidden">
            <button @click="toggleSidebar" class="btn btn-sm btn-ghost">
                <template x-if="!sidebarOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </template>
                <template x-if="sidebarOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </template>
            </button>
        </div>
    </div>
</div>
