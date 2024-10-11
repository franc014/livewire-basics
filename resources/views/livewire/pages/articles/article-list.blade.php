<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 divide-y divide-slate-500 space-y-6">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600" wire:key="{{ $article->id }}">
                                    <td class="border px-4 py-2">{{ $article->title }}</td>
                                    <td class="border px-4 py-2 flex items-center gap-2">
                                        <div class="flex space-x-2">
                                           <a href="/articles/{{ $article->id }}/edit">Edit</a>
                                        </div>
                                        <button class="text-gray-100 font-bold tracking-wider px-2 py-1 text-xs bg-red-700 hover:bg-red-900 rounded-sm" 
                                            wire:click="delete({{$article}})"
                                            wire:confirm="Are you sure you want to delete this article?"
                                        >
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
