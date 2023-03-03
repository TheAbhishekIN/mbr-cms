<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto text-left">
                <h3 class="font-bold tracking-tight text-gray-900">Add Page</h3>
            </div>
            <form wire:submit.prevent="submit" class="mx-auto max-w-7xl sm:mt-5">
                <div class="grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-2">
                    <div>
                        <label for="select-parent" class="block text-sm font-semibold leading-6 text-gray-900">Select Parent
                            Page</label>
                        <div class="mt-2.5">
                            <select wire:model="parent_id"
                                class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                <option value="">Select Parent Page</option>
                                @foreach ($pages as $key => $page)
                                    <option value="{{$key}}">{{$page}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                        <div class="mt-2.5">
                            <input type="text" wire:model="title" id="title" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="content"
                            class="block text-sm font-semibold leading-6 text-gray-900">Content</label>
                        <div class="mt-2.5">
                            <div wire:ignore>
                            <textarea wire:model="content"
                                class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                                name="content"
                                id="content">
                                {{$content}}
                            </textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save
                        Page</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('content', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endpush
</div>

