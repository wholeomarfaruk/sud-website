{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Featured Properties', slug: 'featured-properties' }">
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
                {{-- <label for="Search">
                    <span class="text-sm font-medium text-gray-700"> Search </span>

                    <div class="relative">
                        <input type="text" wire:model.live.debounce="search" id="Search"
                            placeholder="Search by Name"
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
                </label> --}}
            </div>
            <div>
                <div class="flex gap-4 sm:gap-6 justify-end items-end mt-2">
                    {{-- <details class="group relative">
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
                    </details> --}}
                    <div class="group">
                        <button wire:click="addFeaturedModalOpen=true" type="button"
                            class="flex items-center gap-2  pb-1 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">
                            <span class="text-sm font-medium"> Add New</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4  min-h-[80vh]">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap flex justify-start gap-3 items-center">
                            {{-- <input type="checkbox" class="my-0.5 size-5 rounded border-gray-300 shadow-sm"> --}}

                            <span class="text-sm font-medium text-gray-900">Title
                        </th>

                        <th class="px-3 py-2 whitespace-nowrap">Status</th>
                        <th class="px-3 py-2 whitespace-nowrap text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 [&>*:nth-child(-n+4)]:border-b-2 [&>*:nth-child(-n+4)]:border-green-500" id="sortable-table" wire:ignore>


                    @if ($featured_properties && $featured_properties->count() >= 1)
                        @foreach ($featured_properties as $featured_item)
                            <tr data-id="{{ $featured_item->id }}" class="*:text-gray-900 *:first:font-medium">
                                <td class="px-3 py-2 whitespace-nowrap flex justify-start gap-2 items-center">
                                    <div class="flex items-center gap-1">
                                        <span class="p-2 cursor-move text-gray-400 hover:text-black"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </span>
                                        {{-- <input type="checkbox" class="my-0.5 size-5 rounded border-gray-300 shadow-sm"
                                            id="Option1"> --}}
                                    </div>
                                    <div class=" sm:shrink-0">
                                        <img alt="" src="{{ file_path($featured_item->property->featured_image_id) }}"
                                            class="size-12 rounded-lg object-cover sm:size-[52px]">

                                    </div>
                                    <div>
                                        <p class="font-bold mb-0 text-sm/2">{{ $featured_item->property->title }}</p>
                                        {{-- <span class="text-xs text-gray-400">#{{ $featured_item->sort_order }}</span><br> --}}
                                        <span
                                            class="text-xs text-gray-400">{{ $featured_item->updated_at->format('d-m-Y h:i A') }}</span>
                                    </div>
                                </td>

                                <td class="px-3 py-2 whitespace-nowrap">
                                    <p class="text-sm text-gray-900 px-2 py-1 rounded-2xl">
                                        {{ $featured_item->property->status == 1 ? 'Active' : 'Inactive' }}
                                    </p>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">

                                      
                                        <button x-data
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
                                                        $wire.delete({{ $featured_item->id }})
                                                    }
                                                })
                                            "
                                            href="{{ route('admin.sliders.create', ['edit' => $featured_item->id]) }}"
                                            class="text-red-500 hover:text-red-600 flex gap-1 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                            DELETE
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="px-3 py-2 text-center">
                                No Data Found
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- =========================== Content End Here ============================ --}}

    </div>
    {{-- =======================================Modals Start Here======================================= --}}
    <div x-cloak  x-data="{
        addFeaturedModalOpen: @entangle('addFeaturedModalOpen')
    }" x-show="addFeaturedModalOpen" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-3">

        <div class="w-full max-w-6xl h-[90vh]  rounded-lg bg-white p-6 shadow-lg flex flex-col  ">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-300 pb-2 ">
                <h2 class="text-xl font-bold">Make Featured Properties</h2>

                <button wire:click="addFeaturedModalOpen=false" class="p-2 rounded hover:bg-gray-100 ">
                    ✕
                </button>
            </div>

            <div class="mt-4">
                <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                    @foreach ($properties as $item)
                        <div
                            class="item group relative rounded-md shadow-md overflow-hidden
                            after:content-['']
                            before:absolute
                            before:w-full before:h-full
                            before:bg-gray-500/50
                            before:opacity-0
                            hover:before:opacity-100
                            before:top-0 before:right-0
                            before:transition
                            before:duration-300">
                            <img src="{{ file_path($item->featured_image_id) }}" class="w-full h-full object-cover">
                            <div
                                class=" absolute flex items-center justify-between min-h-10 top-1 left-0 right-0 w-full px-2 z-2 ">
                                @if ($item->featured()->exists())
                                    <span
                                        class="badge rounded-full px-2 py-1 text-xs font-semibold mr-2 bg-green-500 text-white">
                                        Added
                                    </span>
                                    @else
                                      <span
                                        class="">
                                     
                                    </span>
                                @endif
                                <span wire:click="addFeatured({{ $item->id }})" class=" cursor-pointer">
                                    @if ($item->featured()->exists())
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-red-600 size-8 p-2 bg-white   rounded-full">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-white size-8 ">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d=" M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    @endif

                                </span>
                            </div>
                            <div
                                class=" absolute flex items-center justify-center min-h-10 -bottom-10 left-0 right-0 w-full px-2 z-2 transition-all duration-500 group-hover:bottom-1">
                                <h2 class="text-white text-xl">{{ $item->title }}</h>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    {{-- ========================================Modals End Here=======================================  --}}
</div>
{{-- =========================== Page Layout End Here ============================ --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const el = document.getElementById('sortable-table');

            Sortable.create(el, {
                animation: 150,
                handle: ".cursor-move",
                onEnd: function() {

                    let order = [];

                    document.querySelectorAll('#sortable-table tr').forEach((row, index) => {
                        order.push({
                            id: row.dataset.id,
                            position: index + 1
                        });
                    });

                    Livewire.dispatch('updateOrder', {
                        order: order
                    });
                }
            });

        });
    </script>
@endpush
