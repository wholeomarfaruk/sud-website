{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Testimonials', slug: 'testimonials' }">

    {{-- ======================== Page Header ======================== --}}
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
                <li class="text-sm text-gray-800 dark:text-white/90" x-text="$store.pageName?.name ?? ''"></li>
            </ol>
        </nav>
    </div>
    {{-- ======================== Page Header End ======================== --}}

    <div class="flex-1 w-full bg-white rounded-lg min-h-[80vh]">

        {{-- Toolbar --}}
        <div class="flex justify-end px-4 py-4">
            <button wire:click="$set('modalOpen', true)" type="button"
                class="inline-flex items-center gap-2 rounded border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:border-gray-400 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add New Testimonial
            </button>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4 min-h-[70vh]">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Review</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100" id="sortable-table" wire:ignore>

                    @if ($testimonials && $testimonials->count() >= 1)
                        @foreach ($testimonials as $item)
                            <tr data-id="{{ $item->id }}" class="hover:bg-gray-50 transition-colors">

                                {{-- Author --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="cursor-move text-gray-300 hover:text-gray-500 transition-colors shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </span>
                                        @if ($item->image_id)
                                            <a href="{{ file_path($item->image_id) }}" data-fancybox="testimonials">
                                                <img src="{{ file_path($item->image_id) }}"
                                                    alt="{{ $item->author_name }}"
                                                    class="h-10 w-10 rounded-full object-cover ring-1 ring-gray-200 shrink-0">
                                            </a>
                                        @else
                                            <span class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                </svg>
                                            </span>
                                        @endif
                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $item->author_name }}</p>
                                            @if ($item->designation)
                                                <p class="text-xs text-gray-400 truncate">{{ $item->designation }}</p>
                                            @endif
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $item->updated_at->format('d M Y') }}</p>
                                        </div>
                                        @if ($item->video_id)
                                            <span class="ml-1 inline-flex items-center gap-0.5 rounded-full bg-indigo-50 px-1.5 py-0.5 text-[10px] font-medium text-indigo-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                                </svg>
                                                Video
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Content preview --}}
                                <td class="px-4 py-3 max-w-xs">
                                    <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($item->content, 80) }}</p>
                                </td>

                                {{-- Sort order --}}
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-gray-100 text-xs font-semibold text-gray-600">
                                        {{ $item->sort_order }}
                                    </span>
                                </td>

                                {{-- Status toggle --}}
                                <td class="px-4 py-3">
                                    <div class="flex justify-center"
                                        x-data="{ active: {{ $item->status ? 'true' : 'false' }} }">
                                        <button type="button"
                                            @click="active = !active; $wire.toggleStatus({{ $item->id }})"
                                            :class="active ? 'bg-blue-600' : 'bg-gray-200'"
                                            class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                                            :title="active ? 'Active — click to deactivate' : 'Inactive — click to activate'">
                                            <span
                                                :class="active ? 'translate-x-4' : 'translate-x-0'"
                                                class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                            </span>
                                        </button>
                                        <span :class="active ? 'text-blue-600' : 'text-gray-400'"
                                            class="ml-2 text-xs font-medium select-none"
                                            x-text="active ? 'Active' : 'Inactive'">
                                        </span>
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-3">
                                        <button type="button" wire:click="edit({{ $item->id }})"
                                            class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Edit
                                        </button>
                                        <button type="button" x-data
                                            @click="Swal.fire({
                                                title: 'Delete this testimonial?',
                                                text: 'This action cannot be undone.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#6b7280',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $wire.delete({{ $item->id }})
                                                }
                                            })"
                                            class="inline-flex items-center gap-1 text-sm text-red-500 hover:text-red-700 font-medium transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-sm text-gray-400">
                                No testimonials found. Click "Add New Testimonial" to get started.
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>

    {{-- ======================== Modal ======================== --}}
    <div x-cloak x-data="{ modalOpen: @entangle('modalOpen') }" x-show="modalOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4"
        role="dialog" aria-modal="true" aria-labelledby="modalTitle">

        <div class="w-full md:w-120 rounded-lg bg-white p-6 shadow-lg max-h-[90vh] overflow-y-auto">

            {{-- Header --}}
            <div class="flex items-start justify-between mb-4">
                <h2 id="modalTitle" class="text-lg font-bold text-gray-900">
                    {{ $editMode ? 'Edit Testimonial' : 'Add New Testimonial' }}
                </h2>
                <button wire:click="$set('modalOpen', false)" type="button"
                    class="cursor-pointer -me-2 -mt-2 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="save" class="space-y-4">

                {{-- Author Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1" for="t_author_name">
                        Author Name <span class="text-red-500">*</span>
                    </label>
                    <input wire:model="author_name" id="t_author_name" type="text"
                        placeholder="e.g. Abdur Rahman"
                        class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                    @error('author_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Designation --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1" for="t_designation">
                        Designation / Role
                    </label>
                    <input wire:model="designation" id="t_designation" type="text"
                        placeholder="e.g. Client, Land owner"
                        class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                    @error('designation')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1" for="t_content">
                        Review <span class="text-red-500">*</span>
                    </label>
                    <textarea wire:model="content" id="t_content" rows="4"
                        placeholder="Enter the testimonial text..."
                        class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm resize-none"></textarea>
                    @error('content')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sort Order --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1" for="t_sort_order">
                        Sort Order
                    </label>
                    <input wire:model="sort_order" id="t_sort_order" type="number" min="0"
                        placeholder="e.g. 1"
                        class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                    <p class="mt-1 text-xs text-gray-400">Lower number appears first</p>
                    @error('sort_order')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1" for="t_status">Status</label>
                    <select wire:model="status" id="t_status"
                        class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:outline-none px-3 py-2 text-sm">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Photo --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1">
                        Author Photo
                    </label>
                    <input wire:model="image_id" type="hidden" />

                    {{-- Upload button --}}
                    <button type="button"
                        wire:click="$dispatch('openMediaPicker', { target: 'image_id', multiple: false, type: 'image' })"
                        class="flex items-center justify-center gap-2 w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg text-gray-500 hover:border-indigo-400 hover:text-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                        <span class="text-sm font-medium">{{ $image_id ? 'Change Photo' : 'Choose Author Photo' }}</span>
                    </button>

                    {{-- Preview --}}
                    @if ($image_id)
                        <div class="mt-3 relative inline-block">
                            <img src="{{ file_path($image_id) }}"
                                alt="Author photo preview"
                                class="h-16 w-16 object-cover rounded-full border border-gray-200 shadow-sm">
                            <button type="button"
                                wire:click.stop="removeMedia('image_id')"
                                class="absolute -top-1 -right-1 w-6 h-6 rounded-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center shadow-md border-2 border-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    @error('image_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Video --}}
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-1">
                        Testimonial Video
                        <span class="text-xs text-gray-400 font-normal">(optional — plays in popup)</span>
                    </label>
                    <input wire:model="video_id" type="hidden" />

                    {{-- Upload button --}}
                    <button type="button"
                        wire:click="$dispatch('openMediaPicker', { target: 'video_id', multiple: false, type: 'video' })"
                        class="flex items-center justify-center gap-2 w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg text-gray-500 hover:border-indigo-400 hover:text-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <span class="text-sm font-medium">{{ $video_id ? 'Change Video' : 'Choose Video' }}</span>
                    </button>

                    {{-- Video preview badge --}}
                    @if ($video_id)
                        <div class="mt-2 flex items-center gap-2 p-2 rounded-lg border border-gray-200 bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                            <span class="text-xs text-gray-600 truncate flex-1">Video attached</span>
                            <button type="button" wire:click.stop="removeMedia('video_id')"
                                class="text-red-500 hover:text-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    @error('video_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full rounded-lg border border-indigo-600 bg-white px-4 py-2.5 text-sm font-medium text-indigo-600 transition-colors hover:bg-indigo-600 hover:text-white cursor-pointer">
                    {{ $editMode ? 'Update Testimonial' : 'Add Testimonial' }}
                </button>

            </form>
        </div>
    </div>

    @livewire('admin.file.media-picker', ['mediapickerModal' => false])

</div>
{{-- ======================== Page Layout End ======================== --}}

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Fancybox.bind("[data-fancybox]", {});

            const el = document.getElementById('sortable-table');
            Sortable.create(el, {
                animation: 150,
                handle: ".cursor-move",
                onEnd: function () {
                    let order = [];
                    document.querySelectorAll('#sortable-table tr[data-id]').forEach((row, index) => {
                        order.push({ id: row.dataset.id, position: index + 1 });
                    });
                    Livewire.dispatch('updateOrder', { order: order });
                }
            });
        });
    </script>
@endpush
