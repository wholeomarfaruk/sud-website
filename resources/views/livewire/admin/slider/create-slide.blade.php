{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: '{{ $is_edit ? 'Edit Slide' : 'Create Slide' }}', slug: 'create-slide' }">
    {{-- ======================== Page Header Start From Here ======================== --}}
    <div class="flex flex-wrap justify-between gap-6">
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''"></h1>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('admin.dashboard') }}">
                        Dashboard
                        <svg class="stroke-current size-4" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('admin.sliders') }}">
                        Sliders
                        <svg class="stroke-current size-4" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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
        <div class="grid grid-cols-2 gap-4 px-4 py-4">
            <div></div>
            <div>
                <div class="flex gap-4 sm:gap-6 justify-end items-center mt-2">
                    <div class="grid grid-cols-2 gap-4">

                        {{-- Status toggle --}}
                        <div x-data="{ switchOn: @entangle('status') }" class="flex items-center justify-center space-x-2">
                            <input id="statusToggle" type="checkbox" name="switch" class="hidden" :checked="switchOn">
                            <button x-ref="switchButton" type="button" @click="switchOn = !switchOn"
                                :class="switchOn ? 'bg-blue-600' : 'bg-neutral-200'"
                                class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
                                x-cloak>
                                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                                    class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                            </button>
                            <label @click="$refs.switchButton.click(); $refs.switchButton.focus()"
                                :id="$id('switch')"
                                :class="{ 'text-blue-600': switchOn, 'text-gray-400': !switchOn }"
                                class="text-sm select-none" x-cloak>
                                <span x-text="switchOn ? 'Active' : 'Inactive'"></span>
                            </label>
                        </div>

                        {{-- Save button --}}
                        <button wire:click="save()" type="button"
                            class="flex justify-center items-center gap-2 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                            <span class="text-sm font-medium">{{ $is_edit ? 'Update' : 'Save' }}</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div class="rounded shadow-sm mx-4">
            <form action="#" wire:submit.prevent="save"
                class="min-w-full divide-y-2 divide-gray-200 px-3 py-2 flex flex-wrap md:flex-nowrap gap-2 min-h-[80vh]">

                {{-- ── Left panel ── --}}
                <div class="w-full md:w-[70%] border border-gray-300 px-3 py-2 space-y-4">

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1" for="title">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="title" id="title" type="text" placeholder="Enter title"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        @error('title')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sub Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1" for="sub_title">
                            Sub Title <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="sub_title" id="sub_title" type="text" placeholder="Enter sub title"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        @error('sub_title')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1" for="link">
                            Link <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="link" id="link" type="text" placeholder="https://..."
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        @error('link')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1" for="description">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea wire:model="description" id="description" rows="4"
                            placeholder="Enter description"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm resize-none"></textarea>
                        @error('description')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Banner Image --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">
                            Banner Image <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="image_id" id="image_id" type="hidden" />

                        {{-- Upload button (separate from preview) --}}
                        <button type="button"
                            wire:click="$dispatch('openMediaPicker', { target: 'image_id', multiple: false, type: 'image' })"
                            class="flex items-center justify-center gap-2 w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg text-gray-500 hover:border-indigo-400 hover:text-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            <div class="text-center">
                                <span class="text-sm font-medium block">{{ $image_id ? 'Change Image' : 'Choose Banner Image' }}</span>
                                <span class="text-xs text-gray-400">Recommended: 1900 × 900 px</span>
                            </div>
                        </button>

                        {{-- Preview (separate, no wire:click on container) --}}
                        @if ($image_id)
                            <div class="mt-3">
                                @if (is_array($image_id))
                                    <div class="flex flex-wrap gap-3">
                                        @foreach ($image_id as $item)
                                            <div class="relative h-24 w-40 flex-shrink-0">
                                                <img src="{{ file_path($item) }}"
                                                    class="h-full w-full object-cover rounded-lg border border-gray-200 shadow-sm">
                                                <button type="button"
                                                    wire:click.stop="removeMedia('image_id', '{{ $item }}')"
                                                    class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center shadow-md border-2 border-white transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="relative group">
                                        <img src="{{ file_path($image_id) }}"
                                            class="w-full max-h-56 object-cover rounded-lg border border-gray-200 shadow-sm">
                                        <button type="button"
                                            wire:click.stop="removeMedia('image_id', '{{ $image_id }}')"
                                            class="absolute top-2 right-2 w-7 h-7 rounded-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center shadow-md border-2 border-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @error('image_id')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- ── Right panel ── --}}
                <div class="w-full md:w-[30%] border border-gray-300 px-3 py-4 space-y-4">

                    {{-- Sort Order --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1" for="sort_order">
                            Sort Order <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="sort_order" id="sort_order" type="number" min="0"
                            placeholder="e.g. 1"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        <p class="mt-1 text-xs text-gray-400">Lower number appears first</p>
                        @error('sort_order')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </form>
        </div>
        {{-- =========================== Content End Here ============================ --}}
    </div>

    @livewire('admin.file.media-picker', ['mediapickerModal' => false])
</div>
{{-- =========================== Page Layout End Here ============================ --}}
