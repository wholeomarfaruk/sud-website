{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Create Slide', slug: 'create-slide' }">
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
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('admin.sliders') }}">
                        Sliders
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

            </div>
            <div>
                <div class="flex gap-4 sm:gap-6 justify-end items-end mt-2">

                    <div class="group grid grid-cols-2 gap-4">
                        <div x-data="{ switchOn: @entangle('status') }" class="flex items-center justify-center space-x-2">
                            <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

                            <button x-ref="switchButton" type="button" @click="switchOn = ! switchOn"
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
                        <button wire:click="save()" type="button"
                            class="flex justify-center items-center gap-2  pb-1 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">
                            <span class="text-sm font-medium"> Save</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded  shadow-sm mx-4">
            <form action=""
                class="min-w-full divide-y-2 divide-gray-200 px-3 py-2  flex flex-wrap md:flex-nowrap gap-2 min-h-[80vh]">
                <div class="w-full md:w-[70%] border border-gray-300 px-3 py-2">
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="title">Title
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="title"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="title" type="text" placeholder="Enter Title" />
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="sub_title">Sub Title
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="sub_title"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="sub_title" type="text" placeholder="Enter sub title" />
                        @error('sub_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="link">Link
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="link"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="link" type="text" placeholder="Enter link" />
                        @error('link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="description">Description
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <textarea wire:model="description"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="description" type="text" placeholder="Enter Description">  </textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="image_id">Banner Image
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="image_id" id="image_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'image_id', multiple: false, type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid  place-content-center {{ $image_id ? '' : ' cursor-pointer' }}">
                            @if ($image_id)
                                @if (is_array($image_id))


                                    @foreach ($image_id as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('image_id', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($image_id) }}" class="w-32 rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('image_id', '{{ $image_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload Image</span><br>
                                <span class="text-gray-400 text-xs">Recommended size: 1900x900 px</span>
                            @endif
                        </div>
                        @error('image_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="w-full md:w-[30%] border border-gray-300 px-3 py-2">

                </div>


            </form>
        </div>

        {{-- =========================== Content End Here ============================ --}}

    </div>
    @livewire('admin.file.media-picker', ['mediapickerModal' => false])
</div>
{{-- =========================== Page Layout End Here ============================ --}}
