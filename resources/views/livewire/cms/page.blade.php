<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input wire:model="search" type="search" placeholder="Search pages by title..." class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ##
                </th>
                <th scope="col" class="px-6 py-3">
                    Parent Page
                </th>
                <th scope="col" class="px-6 py-3">
                    Page Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody wire:loading.flex wire:target="search">
            <tr class="">
                <th colspan="6" class="scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"">Loading data...</th>
            </tr>
        </tbody>
        <tbody wire:loading.remove wire:target="search">
            @foreach ($pages as $page)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $page->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $page->parent_page?->title }} - {{ $page->parent_id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $page->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $page->slug }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $page->created_at->format('d M, Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <button class="bg-blue-800 text-white px-2 py-1 hover:bg-blue-600 rounded">Edit</button>
                        @if($deletePage == $page->id)
                            <button wire:click="deletePage({{ $page->id }})" class="bg-red-900 text-white px-2 py-1 hover:bg-red-800 rounded">Sure?</button>
                        @else                            
                            <button wire:click="confirmDelete({{ $page->id }})" class="bg-red-700 text-white px-2 py-1 hover:bg-red-600 rounded">Delete</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            {{ $pages->links() }}
        </tbody>
    </table>
</div>
    </div>
</div>
