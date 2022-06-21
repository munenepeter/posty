 <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Posts') }}
     </h2>
 </x-slot>

 <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex justify-end mb-2">
             <x-jet-button wire:click="showPostModal">Create</x-jet-button>
         </div>
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             <div class="p-2">

                 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                     <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                             <tr>
                                 <th scope="col" class="px-6 py-3">
                                     Post Title
                                 </th>
                                 <th colspan="2" scope="col" class="px-6 py-3">
                                     Post Body
                                 </th>

                                 <th scope="col" class="px-6 py-3">
                                     Author
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     <span class="sr-only">Edit</span>
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($posts as $post)
                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                     <th scope="row"
                                         class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                         {{ $post->title }}
                                     </th>
                                     <td colspan=2" class="px-6 py-4">
                                         {{ $post->body }}
                                     </td>

                                     <td  class="px-6 py-4">
                                         {{ $post->user->name }} <br>
                                         {{$post->created_at->diffForHumans();}}
                                     </td>
                                     <td class="px-6 py-4 text-right">
                                         <div class="flex space-x-2">
                                            <a wire:click.prevent="showEditPostModal({{ $post->id }})" href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
   
                                                <a wire:click.prevent="deletePost({{ $post->id }})" href="#"
                                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">  &nbsp;Delete</a>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach


                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         <div class="modal">
             <x-jet-dialog-modal wire:model="showingPostModal">
                 @if ($isEditMode)
                     <x-slot name="title">Update Post</x-slot>
                 @else
                     <x-slot name="title">Create Post</x-slot>
                 @endif
                 <x-slot name="content">


                     <form>

                         <div class="mb-6">
                             <label for="title"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post
                                 Title</label>
                             <input type="text" wire:model.lazy="title" name="title" id="title"
                                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-14 p-4 "
                                 required="">
                             @error('title')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="mb-6">
                             <label for="body"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post
                                 Body</label>
                             <textarea id="body" wire:model.lazy="body" name="body" rows="4"
                                 class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                 placeholder="Post Something..."></textarea>
                             @error('body')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                     </form>


                 </x-slot>
                 <x-slot name="footer">
                     @if ($isEditMode)
                         <x-jet-button class="bg-blue-500" wire:click="updatePost">Update</x-jet-button>
                     @else
                         <x-jet-button class="bg-blue-500" wire:click="storePost">Save</x-jet-button>
                     @endif
                 </x-slot>
             </x-jet-dialog-modal>

         </div>
     </div>
 </div>
