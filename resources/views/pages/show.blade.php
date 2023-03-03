<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                    
<div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$page->title}}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        {!! $page->content !!}    
    </p>
    
</div>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>