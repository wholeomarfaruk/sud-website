{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: '{{ $editMode ? 'Update Blog' : 'Create Blog' }}', slug: 'create-blog' }">
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
                        href="{{ route('admin.blogs') }}">
                        Blogs
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
                        <label class="block text-sm font-medium text-gray-900" for="featured_image">Featured Image
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="featured_image" id="featured_image" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'featured_image', multiple: false,type: 'image' })"
                            class="min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $featured_image ? 'grid-cols-4' : 'place-content-center cursor-pointer' }}">
                            @if ($featured_image)
                                @if (is_array($featured_image))


                                    @foreach ($featured_image as $item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($item) }}" class="w-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('featured_image', '{{ $item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($featured_image) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('featured_image', '{{ $featured_image }}')"
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
                        <label class="block text-sm font-medium text-gray-900" for="meta_image">Meta Image
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>
                        <input wire:model="meta_image" id="meta_image" type="hidden" />
                        <div wire:click="$dispatch('openMediaPicker', { target: 'meta_image', multiple: false,type: 'image' })"
                            class=" min-h-30 bg-gray-200 border border-gray-300 rounded-lg shadow-sm w-full
                        grid   {{ $meta_image ? 'grid-cols-4' : 'place-content-center cursor-pointer' }}">
                            @if ($meta_image)
                                @if (is_array($meta_image))
                                    @foreach ($meta_image as $meta_image_item)
                                        <div class="relative inline-block m-2 h-25">
                                            <img src="{{ file_path($meta_image_item) }}"
                                                class="h-full rounded border">
                                            <button type="button"
                                                wire:click="removeMedia('meta_image', '{{ $meta_image_item }}')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative inline-block m-2">
                                        <img src="{{ file_path($meta_image) }}" class="w-full rounded border">
                                        <button type="button"
                                            wire:click="removeMedia('meta_image', '{{ $meta_image }}')"
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
                        <label class="block text-sm font-medium text-gray-900" for="is_featured">Is Featured
                            <span class="size-6 text-red-500 mr-1.5">*</span> </label>

                        <select wire:model="is_featured"
                            class="mt-1 w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none p-2">
                            <option value="">Select is featured</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('is_featured')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                </div>


            </form>
        </div>

        {{-- =========================== Content End Here ============================ --}}

    </div>
    {{-- =======================================Modals Start Here======================================= --}}

    @livewire('admin.file.media-picker', ['mediapickerModal' => false])
    {{-- ========================================Modals End Here=======================================  --}}

</div>
{{-- =========================== Page Layout End Here ============================ --}}
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/6fc0o57nwmnuyujo3x2t2m7qttqr09s74djxb47lnzygcixp/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

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


        });

    </script>
@endpush
