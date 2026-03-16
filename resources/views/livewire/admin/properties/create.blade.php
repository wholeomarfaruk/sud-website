{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: '{{ $editMode ? 'Update Property' : 'Create Property' }}', slug: 'create-property' }">
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
                        href="{{ route('admin.properties') }}">
                        Properties
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
                            <span class="text-sm font-medium"> {{ $editMode ? 'Update' : 'Save' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto rounded  shadow-sm mx-4">
            <form action="#" wire:submit.prevent="save"
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
                        <label class="block text-sm font-medium text-gray-900" for="address">Address
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="location"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="address" type="text" placeholder="Enter Address" />
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="location_id">Location
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>

                        <select wire:model="location_id"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <option value="">Select location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="featured_image_id">Featured Image
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="featured_image_id" id="featured_image_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'featured_image_id', multiple: false,type: 'image' })"
                            class="min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $featured_image_id ? 'grid-cols-4' : 'place-content-center cursor-pointer' }}">
                            @if ($featured_image_id)
                                @if (is_array($featured_image_id))


                                    @foreach ($featured_image_id as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="w-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('featured_image_id', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($featured_image_id) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('featured_image_id', '{{ $featured_image_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload Image</span>
                            @endif
                        </div>
                        @error('featured_image_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="hero_video_id">Featured Video
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="hero_video_id" id="hero_video_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'hero_video_id', multiple: false, type: 'video' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $hero_video_id ? 'grid-cols-4' : ' place-content-center cursor-pointer' }}">
                            @if ($hero_video_id)
                                @if (is_array($hero_video_id))


                                    @foreach ($hero_video_id as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="w-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('hero_video_id', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($hero_video_id) }}" class="w-full rounded border replace-video-preview">
                                        <button type="button"
                                            wire:click="removeMedia('hero_video_id', '{{ $hero_video_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload Video</span>
                            @endif
                        </div>
                        @error('hero_video_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="hero_image_id">Slider Images
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="hero_image_id" id="hero_image_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'hero_image_id', multiple: true, type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $hero_image_id ? 'grid-cols-4' : ' place-content-center cursor-pointer' }}">
                            @if ($hero_image_id)
                                @if (is_array($hero_image_id))

                                    @foreach ($hero_image_id as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('hero_image_id', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($hero_image_id) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('hero_image_id', '{{ $hero_image_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload images</span>
                            @endif
                        </div>
                        @error('hero_image_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2 mt-3">
                        <h3 class="text-2xl font-extrabold bg-gray-300 px-1 py-1 rounded ">Project Details</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2" wire:ignore>
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
                        <label class="block text-sm font-medium text-gray-900" for="gallery">gallery Images
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="gallery" id="gallery" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'gallery', multiple: true, type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $gallery ? 'grid-cols-4' : 'place-content-center cursor-pointer' }}">
                            @if ($gallery)
                                @if (is_array($gallery))

                                    @foreach ($gallery as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('gallery', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($gallery) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('gallery', '{{ $gallery }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload images</span>
                            @endif
                        </div>
                        @error('gallery')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="videos">Video Gallery
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="videos" id="videos" type="hidden" />
                        <div class="flex justify-end">
                            <button type="button" wire:click="addVideoModalOpen=true"
                                class="flex items-center gap-2  pb-1 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">+Add</button>
                        </div>
                        @if ($videos)
                            @if (is_array($videos))
                                @foreach ($videos as $index => $video_item)
                                    <div class="flex border border-gray-300 px-2 py-2 rounded-xl gap-2">
                                        <div class="w-40"><img class="w-full rounded"
                                                src="{{ file_path($video_item['thumbnail_id']) }}" alt="">
                                            <p class="text-sm text-gray-500">
                                                {{ basename(file_path($video_item['video_id'])) }}
                                            </p>
                                        </div>
                                        <div class="w-[40%]">
                                            <h4 class="font-bold">{{ $video_item['title'] }}</h4>
                                            <p>
                                                {{ gmdate('i:s', $video_item['duration']) }}</p>
                                        </div>
                                        <div class="flex-1 flex justify-end items-center gap-2">
                                            <a href="{{ file_path($video_item['video_id']) }}" data-fancybox
                                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                                </svg>

                                                Play
                                            </a>
                                            <button type="button"
                                                wire:click="removeMedia('videos', '{{ $video_item['video_id'] }}')"
                                                class="inline-flex items-center cursor-pointer bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                        @error('videos')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="amintyName">Amenities</label>
                        <!-- Input -->
                        <div class="flex gap-2">
                            <input type="text" wire:model.defer="amintyName" placeholder="Enter amenity..."
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">

                            <button type="button" wire:click="addAmenity"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                                Add
                            </button>
                        </div>


                        <!-- Amenities List -->
                        <div id="amenitiesList" class="space-y-2">

                            @foreach ($aminities as $index => $amenity)
                                <div wire:key="amenity-{{ $index }}" data-index="{{ $index }}"
                                    class="cursor-move flex items-center justify-between bg-gray-100 px-3 py-2 rounded-lg">

                                    <span class="text-gray-700">
                                        {{ $amenity }}
                                    </span>

                                    <button type="button" wire:click="removeAmenity({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="additionalName">Additional
                            Info</label>
                        <!-- Input -->
                        <div class="flex gap-2">
                            <input type="text" wire:model.defer="additionalName" placeholder="Enter name..."
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <input type="text" wire:model.defer="additionalValue" placeholder="Enter value..."
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">

                            <button type="button" wire:click="addAdditional"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                                Add
                            </button>
                        </div>


                        <!-- Amenities List -->
                        <div id="additionalInfoList" class="space-y-2">

                            @foreach ($additional_info as $index => $additional_info_item)
                                <div wire:key="additional_info-{{ $index }}" data-index="{{ $index }}"
                                    class="cursor-move flex items-center justify-between bg-gray-100 px-3 py-2 rounded-lg">

                                    <span class="text-gray-700">
                                        {{ $additional_info_item['name'] }} : {{ $additional_info_item['value'] }}
                                    </span>

                                    <button type="button" wire:click="removeAdditional({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="addressName">Address</label>
                        <!-- Input -->
                        <div class="flex gap-2">
                            <input type="text" wire:model.defer="addressName" placeholder="Enter name..."
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <input type="text" wire:model.defer="addressValue" placeholder="Enter value..."
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">

                            <button type="button" wire:click="addAddress"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                                Add
                            </button>
                        </div>


                        <!-- Amenities List -->
                        <div id="AddressList" class="space-y-2">

                            @foreach ($address as $index => $address_item)
                                <div wire:key="address-{{ $index }}" data-index="{{ $index }}"
                                    class="cursor-move flex items-center justify-between bg-gray-100 px-3 py-2 rounded-lg">

                                    <span class="text-gray-700">
                                        {{ $address_item['name'] }} : {{ $address_item['value'] }}
                                    </span>

                                    <button type="button" wire:click="removeAddress({{ $index }})"
                                        class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="embaded_map">Google Embaded Map
                            Url
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="embaded_map"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="embaded_map" type="text" placeholder="Google Embaded Map Url" />
                        @error('embaded_map')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2 mt-3">
                        <h3 class="text-2xl font-extrabold bg-gray-300 px-1 py-1 rounded ">SEO Details</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="meta_title">Meta Title
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="meta_title"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="meta_title" type="text" placeholder="Enter meta title" />
                        @error('meta_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1">
                        <label class="block text-sm font-medium text-gray-900" for="name">Url Slug</label>
                        <div class="relative">
                            <input wire:model="slug"
                                class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                                id="name" type="text" placeholder="Enter slug" />
                            <span wire:click="generateSlug" wire:target="generateSlug"
                                class="text-gray-300 hover:text-black absolute top-2 right-1 text-2xl">

                                <i wire:loading.remove wire:target="generateSlug" class="bx bx-refresh"></i>

                                <i wire:loading wire:target="generateSlug" class="bx bx-refresh bx-spin"></i>

                            </span>
                        </div>

                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="meta_description">Meta Description
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <textarea wire:model="meta_description"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="meta_description" type="text" placeholder="Enter meta description">  </textarea>
                        @error('meta_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="meta_image_id">Meta Image
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="meta_image_id" id="meta_image_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'meta_image_id', multiple: false,type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $meta_image_id ? 'grid-cols-4' : 'place-content-center cursor-pointer' }}">
                            @if ($meta_image_id)
                                @if (is_array($meta_image_id))
                                    @foreach ($meta_image_id as $meta_image_item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($meta_image_item) }}"
                                                class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('meta_image_id', '{{ $meta_image_item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($meta_image_id) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('meta_image_id', '{{ $meta_image_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload Image</span>
                            @endif
                        </div>
                        @error('featured_image_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="w-full md:w-[30%] border border-gray-300 px-3 py-2">
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="property_type">Property Type
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>

                        <select wire:model="property_type"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <option value="">Select Type</option>
                             @foreach (\App\Enums\Project\PropertyType::cases() as $property_type_item)
                            <option value="{{ $property_type_item->value }}">{{ $property_type_item->value }}</option>
                            @endforeach
                           
                        </select>
                        @error('property_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="project_type">Project Type
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>

                        <select wire:model="project_type"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <option value="">Select Type</option>
                            @foreach (\App\Enums\Project\ProjectType::cases() as $project_type_item)
                            <option value="{{ $project_type_item->value }}">{{ $project_type_item->value }}</option>
                            @endforeach
                           
                          
                        </select>
                        @error('project_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="project_status">Project Status
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>

                        <select wire:model="project_status"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <option value="">Select status</option>
                            @foreach (\App\Enums\Project\ProjectStatus::cases() as $project_status_item)
                            <option value="{{ $project_status_item->value }}">{{ $project_status_item->value }}</option>
                            @endforeach
                        </select>
                        @error('project_status')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="area_measurement">Area
                            measurements
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="area_measurement"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="area_measurement" type="text" placeholder="ex: 1500 Sq Ft" />
                        @error('area_measurement')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="bedroom_count">Bedrooms
                        </label>
                        <input wire:model="bedroom_count" min="1"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="bedroom_count" type="number" placeholder="ex: 3" />
                        @error('bedroom_count')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="bathroom_count">Bathrooms
                        </label>
                        <input wire:model="bathroom_count" min="1"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="bathroom_count" type="number" placeholder="ex: 2" />
                        @error('bathroom_count')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="parking_count">Parkings
                        </label>
                        <input wire:model="parking_count" min="1"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="parking_count" type="number" placeholder="ex: 1" />
                        @error('parking_count')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


            </form>
        </div>

        {{-- =========================== Content End Here ============================ --}}

    </div>
    {{-- =======================================Modals Start Here======================================= --}}
    <div x-cloak x-data="{ addVideoModalOpen: @entangle('addVideoModalOpen') }" x-show="addVideoModalOpen" x-transition
        class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog" aria-modal="true"
        aria-labelledby="modalTitle">
        <div class="w-full md:w-md  rounded-lg bg-white p-6 shadow-lg">
            <div class="flex items-start justify-between">
                <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Add Video</h2>

                <button wire:click="addVideoModalOpen=false" type="button"
                    class="cursor-pointer -me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="mt-4">

                <form action="#" class="space-y-4" wire:submit.prevent="addVideo">
                    <div class="grid grid-cols-1 gap-1">
                        <label class="block text-sm font-medium text-gray-900" for="video_title">Video Title</label>
                        <input wire:model="video_title"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="video_title" type="text" placeholder="Enter video title" />
                        @error('video_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1">
                        <label class="block text-sm font-medium text-gray-900" for="video_duration">video duration
                            (seconds)</label>
                        <input wire:model="video_duration"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2"
                            id="video_duration" type="text" placeholder="Enter video duration in seconds" />
                        @error('video_duration')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="video_thumbnail">Video humbnail
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="video_thumbnail" id="video_thumbnail" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'video_thumbnail', multiple: false,type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid  place-content-center {{ $video_thumbnail ? '' : ' cursor-pointer' }}">
                            @if ($video_thumbnail)
                                @if (is_array($video_thumbnail))
                                    @foreach ($video_thumbnail as $video_thumbnail_item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($video_thumbnail_item) }}"
                                                class="h-full rounded border replace-video-preview">
                                            <button type="button"
                                                wire:click="removeMedia('video_thumbnail', '{{ $video_thumbnail_item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($video_thumbnail) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('video_thumbnail', '{{ $video_thumbnail }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload Image</span>
                            @endif
                        </div>
                        @error('featured_image_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-1 mb-2">
                        <label class="block text-sm font-medium text-gray-900" for="video_id">Video humbnail
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="video_id" id="video_id" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'video_id', multiple: false,type: 'video' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid  place-content-center {{ $video_id ? '' : ' cursor-pointer' }}">
                            @if ($video_id)
                                @if (is_array($video_id))
                                    @foreach ($video_id as $video_id_item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($video_id_item) }}" class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('video_id', '{{ $video_id_item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($video_id) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('video_id', '{{ $video_id }}')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                            ✕
                                        </button>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500">Click to Upload video</span>
                            @endif
                        </div>
                        @error('video_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="block w-full rounded-lg border border-indigo-600 bg-white px-12 py-3 text-sm font-medium text-indigo-600 transition-colors hover:bg-indigo-500 hover:text-white cursor-pointer">
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </div>
    @livewire('admin.file.media-picker', ['mediapickerModal' => false])
    {{-- ========================================Modals End Here=======================================  --}}

</div>
{{-- =========================== Page Layout End Here ============================ --}}
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/6fc0o57nwmnuyujo3x2t2m7qttqr09s74djxb47lnzygcixp/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", {
                // Your custom options for a specific gallery
            });



            tinymce.init({
                selector: '#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',

                setup: function(editor) {

                    editor.on('init change keyup', function() {
                        editor.save();

                        @this.set('description', editor.getContent());
                    });

                }
            });

            //sortable js



            const el = document.getElementById('amenitiesList');

            new Sortable(el, {

                animation: 150,

                onEnd: function() {

                    let order = [];

                    el.querySelectorAll('[data-index]').forEach(item => {
                        order.push(item.dataset.index);
                    });

                    Livewire.dispatch('updateAmenityOrder', {
                        orderedIds: order

                    });

                }

            });
            const el2 = document.getElementById('additionalInfoList');

            new Sortable(el2, {

                animation: 150,

                onEnd: function() {

                    let order = [];

                    el2.querySelectorAll('[data-index]').forEach(item => {
                        order.push(item.dataset.index);
                    });

                    Livewire.dispatch('updateAdditionalOrder', {
                        orderedIds: order

                    });

                }

            });

            const el3 = document.getElementById('AddressList');

            new Sortable(el3, {

                animation: 150,

                onEnd: function() {

                    let order = [];

                    el3.querySelectorAll('[data-index]').forEach(item => {
                        order.push(item.dataset.index);
                    });

                    Livewire.dispatch('updateAddressOrder', {
                        orderedIds: order

                    });

                }

            });





        });

    </script>
@endpush
