<div x-data="{ show: false, card: {} }"
    x-on:card-selected.window="
    fetch(`/boards/cards/${event.detail.id}`, {
        credentials: 'include',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error('Not found');
        return res.json();
    })
    .then(data => { card = data; show = true })
    .catch(err => console.error(err))"
    x-show="show" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center" style="display: none;">
    <div @click.away="show = false" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 w-[400px] max-w-full">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-2" x-text="card.title"></h2>
        <p class="text-gray-700 dark:text-gray-300" x-text="card.description"></p>
        <div class="mt-4 text-right">
            <button @click="show = false"
                class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded hover:bg-gray-400">
                Close
            </button>
        </div>
    </div>
</div>
