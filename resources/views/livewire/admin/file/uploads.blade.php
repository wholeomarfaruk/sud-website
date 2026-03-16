{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Uploads', slug: 'uploads' }">
    {{-- ======================== Page Header Start From Here ======================== --}}
    <div class="flex flex-wrap justify-between gap-6 ">
        {{-- Page Name  --}}
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''">
        </h1>
        {{-- Breadcrumb  --}}
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('admin.dashboard') }}">
                        Dashboard
                        <svg class="stroke-current" width="17" height="16" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>

                    </a>
                </li>
                <li class="text-sm text-gray-800 dark:text-white/90" x-text="$store.pageName?.name ?? ''"></li>
            </ol>
        </nav>
    </div>
    {{-- ======================== Page Header End Here ======================== --}}

    <div class="flex-1 w-full bg-white rounded-lg min-h-[80vh]">
        {{-- ======================== Content Start From Here ======================== --}}


        <div class="grid grid-cols-2 gap-4 px-4 py-4 ">
            <div>
                <label for="Search">
                    {{-- <span class="text-sm font-medium text-gray-700"> Search </span> --}}

                    <div class="relative">
                        <input type="text" wire:model.live.debounce="search" id="Search"
                            placeholder="Search by Name, Email"
                            class="mt-0.5 w-full rounded border border-gray-300 px-2 py-2 shadow-sm sm:text-sm">

                        <span class="absolute inset-y-0 right-2 grid w-8 place-content-center">
                            <button type="button" aria-label="Submit"
                                class="rounded-full p-1.5 text-gray-700 transition-colors hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                    </div>
                </label>
            </div>
            <div>
                <div class="flex gap-4 sm:gap-6 justify-end items-end mt-2">
                    <details class="group relative">
                        <summary
                            class="flex items-center gap-2 border-b border-gray-300 pb-1 text-gray-700 transition-colors hover:border-gray-400 cursor-pointer hover:text-gray-900 [&amp;::-webkit-details-marker]:hidden ">
                            <span class="text-sm font-medium"> Filter </span>

                            <span class="transition-transform group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                </svg>
                            </span>
                        </summary>

                        <div
                            class="z-auto w-64 divide-y divide-gray-300 rounded border border-gray-300 bg-white shadow-sm group-open:absolute group-open:end-0 group-open:top-8">
                            <div class="flex items-center justify-between px-3 py-2">
                                <span class="text-sm text-gray-700"> 0 Selected </span>

                                <button type="button"
                                    class="text-sm text-gray-700 underline transition-colors hover:text-gray-900">
                                    Reset
                                </button>
                            </div>

                            <fieldset class="">
                                <legend class="sr-only">Checkboxes</legend>

                                <div class="flex flex-col items-start gap-3">
                                    <label for="Option1" class="inline-flex items-center gap-3">
                                        <input type="checkbox" class="size-5 rounded border-gray-300 shadow-sm"
                                            id="Option1">

                                        <span class="text-sm font-medium text-gray-700"> Option 1 </span>
                                    </label>

                                    <label for="Option2" class="inline-flex items-center gap-3">
                                        <input type="checkbox" class="size-5 rounded border-gray-300 shadow-sm"
                                            id="Option2">

                                        <span class="text-sm font-medium text-gray-700"> Option 2 </span>
                                    </label>

                                    <label for="Option3" class="inline-flex items-center gap-3">
                                        <input type="checkbox" class="size-5 rounded border-gray-300 shadow-sm"
                                            id="Option3">

                                        <span class="text-sm font-medium text-gray-700"> Option 3 </span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                    </details>
                    <div class="group">
                        <button wire:click="$dispatch('openMediaPicker', { multiple: true })" type="button"
                            class="flex items-center gap-2  pb-1 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">
                            <span class="text-sm font-medium"> Add New File</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded mx-4 px-2">
            <div class="min-w-full divide-y-2 divide-gray-200">

                {{-- <div>
                    <button wire:click="$dispatch('openMediaPicker', { target: 'fileinput', multiple: true })">
                        Select Featured Image
                    </button>

                    <input type="text" name="fileinput" id="fileinput" wire:model="fileinput">
                    @if ($fileinput)
                        @foreach ($fileinput as $item)
                            <div class="relative inline-block m-2">
                                <img src="{{ file_path($item) }}" class="w-32 rounded border">
                                <button type="button" wire:click="removeMedia('fileinput', '{{ $item }}')"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                    ✕
                                </button>
                            </div>
                        @endforeach

                    @endif
                </div> --}}
                <div class="grid grid-cols-5 gap-4 overflow-y-auto">
                    @foreach ($images as $image_file)
                        <!-- example item -->

                        <div
                            class="block relative rounded-lg p-2 shadow-sm border border-gray-200  hover:shadow-lg transition-shadow {{ in_array($image_file->id, $selected) ? 'bg-indigo-400' : '' }}">
                            <img alt=""
                                src="{{ asset('storage/' . $image_file->items->where('type', 'original')->first()->path) }}"
                                class="h-36 w-full rounded-md object-cover">

                            {{-- <div class="mt-6">
                                                <dl>
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <dt class="text-sm text-gray-500">SL- </dt>

                                                            <dd class="text-sm text-gray-500">5</dd>
                                                        </div>
                                                        <span class="text-gray-400 px-2">|</span>
                                                        <div>
                                                            <dt class="sr-only">ID: </dt>

                                                            <dd class="text-sm text-gray-500"># 12</dd>
                                                        </div>
                                                    </div>


                                                    <div>
                                                        <dt class="sr-only">Name:</dt>

                                                        <dd class="font-medium">filename</dd>
                                                    </div>
                                                </dl>

                                                <div class="mt-6 flex items-center gap-8 text-xs">
                                                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">


                                                        <div class="mt-1.5 sm:mt-0">
                                                            <p class="text-gray-500">Quantity</p>

                                                            <p class="font-medium">
                                                                file name
                                                        </div>
                                                    </div>



                                                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">


                                                        <div class="mt-1.5 sm:mt-0">
                                                            <p class="text-gray-500">Per Unit</p>
                                                            <p class="font-medium">
                                                                300kg
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">


                                                        <div class="mt-1.5 sm:mt-0">
                                                            <p class="text-gray-500">Price Per kg</p>

                                                            <p class="font-medium">55 Tk</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                            <div class="absolute top-5 right-5 left-5 flex items-center gap-2 justify-between">
                                <span class="shadow text-gray-700 text-sm bg-red-50/50 rounded px-2">
                                 <input type="checkbox" name="selected[]" value="{{ $image_file->id }}" id="selected-{{ $image_file->id }}" wire:click="selectImage({{ $image_file->id }})"  >
                                </span>
                                <div class="flex gap-2">
                                    <a data-fancybox href="{{file_path($image_file->id)}}" alt="View Product"
                                        class="cursor-pointer rounded-md shadow-lg bg-sky-100 px-1 py-1 text-sky-700 dark:bg-sky-700 dark:text-sky-100">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>



                                    </a>
                                    <span x-data
                                        @click="
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: 'This record will be permanently deleted!',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete customer!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $wire.delete({{ $image_file->id }})
                                                    }
                                                })
                                            "
                                        alt="Delete"
                                        class="cursor-pointer rounded-md shadow-lg bg-red-100 px-1 py-1 text-red-700 dark:bg-red-700 dark:text-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>


                                    </span>
                                    {{-- edit product icon  --}}
                                    <span wire:click="editProduct()" alt="Edit"
                                        class="cursor-pointer rounded-md shadow-lg bg-emerald-100 px-1 py-1 text-emerald-700 dark:bg-emerald-700 dark:text-emerald-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div>
                    {{ $images->links() }}
                </div>
            </div>

        </div>

        {{-- =========================== Content End Here ============================ --}}
        @livewire('admin.file.media-picker', ['mediapickerModal' => false])
    </div>

</div>
{{-- =========================== Page Layout End Here ============================ --}}

@push('scripts')
<script>
    addEventListener("DOMContentLoaded", () => {
        Fancybox.bind("[data-fancybox]", {
  
});
    })

    </script>
@endpush