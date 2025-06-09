<x-mary-form wire:submit.prevent="updateBoard" class="space-y-4">
    <x-mary-input label="Board Name" wire:model.defer="name" required />
    <x-mary-textarea label="Description" wire:model.defer="description" rows="4" />

    <div x-data="{
        preview: @js($existingThumbnail ? asset('storage/' . $existingThumbnail) : null)
    }" class="space-y-2">
        <x-mary-file wire:model="thumbnail_path" label="Thumbnail" hint="Only JPG, PNG, Max 2MB" accept="image/*"
            x-on:change="
                const file = $event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => preview = e.target.result;
                    reader.readAsDataURL(file);
                }
            " />

        <template x-if="preview">
            <img :src="preview" alt="Thumbnail Preview" class="rounded-xl shadow w-full h-32 object-cover" />
        </template>
    </div>

    <div class="flex justify-end space-x-3 pt-2">
        <x-mary-button label="Delete" wire:click="deleteBoard"
            wire:confirm="Are you sure you want to delete this board? This action cannot be undone."
            class="btn-error" />
        <x-mary-button type="submit" label="Save" class="btn-success" spinner="updateBoard" />
    </div>
</x-mary-form>
