{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Sliders', slug: 'slider' }">

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
            <a href="{{ route('admin.sliders.create') }}"
                class="inline-flex items-center gap-2 rounded border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:border-gray-400 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add New Slide
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4 min-h-[70vh]">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Slide</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Link</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100" id="sortable-table" wire:ignore>

                    @if ($sliders->count() >= 1)
                        @foreach ($sliders as $slider_item)
                            <tr data-id="{{ $slider_item->id }}" class="hover:bg-gray-50 transition-colors">

                                {{-- Slide info --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="cursor-move text-gray-300 hover:text-gray-500 transition-colors shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </span>
                                        <div class="shrink-0">
                                            <img src="{{ file_path($slider_item->image_id) }}"
                                                alt="{{ $slider_item->title }}"
                                                class="h-10 w-16 rounded-lg object-cover ring-1 ring-gray-200">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $slider_item->title }}</p>
                                            @if ($slider_item->sub_title)
                                                <p class="text-xs text-gray-400 truncate">{{ $slider_item->sub_title }}</p>
                                            @endif
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $slider_item->updated_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Link --}}
                                <td class="px-4 py-3">
                                    @if ($slider_item->link)
                                        <a href="{{ $slider_item->link }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-xs text-indigo-600 hover:text-indigo-800 hover:underline max-w-[140px] truncate">
                                            {{ Str::limit($slider_item->link, 25) }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400">—</span>
                                    @endif
                                </td>

                                {{-- Sort order --}}
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-gray-100 text-xs font-semibold text-gray-600">
                                        {{ $slider_item->sort_order }}
                                    </span>
                                </td>

                                {{-- Status toggle (Alpine manages UI; Livewire persists) --}}
                                <td class="px-4 py-3">
                                    <div class="flex justify-center"
                                        x-data="{ active: {{ $slider_item->status ? 'true' : 'false' }} }">
                                        <button type="button"
                                            @click="active = !active; $wire.toggleStatus({{ $slider_item->id }})"
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
                                        <a href="{{ route('admin.sliders.create', ['edit' => $slider_item->id]) }}"
                                            class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Edit
                                        </a>
                                        <button type="button" x-data
                                            @click="Swal.fire({
                                                title: 'Delete this slide?',
                                                text: 'This action cannot be undone.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#6b7280',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $wire.delete({{ $slider_item->id }})
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
                                No slides found. Click "Add New Slide" to get started.
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
        {{-- ======================== Content End ======================== --}}

    </div>
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
