 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <x-jet-button wire:click="showPostModal">Create</x-jet-button>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                Insert table
            </div>
            <div class="modal">
                <x-jet-dialog-modal wire:model="showingPostModal">
                    <x-slot name="title">Create Post</x-slot>
                    <x-slot name="content">


                        <form method="post" action="">
                           
                            <div class="mb-6">
                              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Title</label>
                              <input type="text"  name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-14 p-4 " required="">
                            </div>
                            <div class="mb-6">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Body</label>
                                <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Post Something..."></textarea>
                            </div>
                           
                          </form>
                          

                    </x-slot>
                    <x-slot name="footer">
                        <x-jet-button class="bg-blue-500" wire:click="showPostModal">Save</x-jet-button>

                    </x-slot>
                </x-jet-dialog-modal>

            </div>
        </div>
    </div>
 
