 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-jet-button wire:click="showPostModal">Create</x-jet-button>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                Insert table
            </div>
            <div class="modal">
                <x-jet-dialog-modal wire:model="showingPostModal">
                    <x-slot name="title">Post Title</x-slot>
                    <x-slot name="content">Post Content</x-slot>
                    <x-slot name="footer">Post Footer</x-slot>
                </x-jet-dialog-modal>

            </div>
        </div>
    </div>
 
