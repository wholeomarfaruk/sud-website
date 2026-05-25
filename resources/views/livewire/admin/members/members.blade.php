{{-- ======================== Page Layout Start From Here ======================== --}}
<div x-data x-init="$store.pageName = { name: 'Manage Board Members' }">
    {{-- ======================== Page Header Start From Here ======================== --}}
    <div class="flex flex-wrap justify-between gap-6">
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''"></h1>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('admin.dashboard') }}">
                        Dashboard
                        <svg class="stroke-current" width="17" height="16" xmlns="http://www.w3.org/2000/svg"
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
        <div class="flex justify-end px-4 py-4">
            <button wire:click="modalOpen=true" type="button"
                class="flex items-center gap-2 text-gray-700 transition-colors hover:border-gray-400 hover:text-gray-900 cursor-pointer rounded border border-gray-300 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-sm font-medium">Add New</span>
            </button>
        </div>

        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4 min-h-[70vh]">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="bg-gray-50 ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900">
                        <th class="px-3 py-2 whitespace-nowrap text-left text-sm">Member</th>
                        <th class="px-3 py-2 whitespace-nowrap text-left text-sm">Status</th>
                        <th class="px-3 py-2 whitespace-nowrap text-center text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200" id="sortable-table" wire:ignore>
                    @if ($members && $members->count() >= 1)
                        @foreach ($members as $member)
                            <tr data-id="{{ $member->id }}" class="hover:bg-gray-50 *:text-gray-900">
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <span class="p-1.5 cursor-move text-gray-300 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </span>
                                        <a href="{{ file_path($member->image) }}" data-fancybox>
                                            <img alt="{{ $member->name }}" src="{{ file_path($member->image) }}"
                                                class="size-12 rounded-lg object-cover ring-1 ring-gray-200">
                                        </a>
                                        <div>
                                            <p class="font-semibold text-sm text-gray-900">{{ $member->name }}</p>
                                            <p class="text-xs text-indigo-500 font-medium">{{ $member->designation }}</p>
                                            @if ($member->description)
                                                <p class="text-xs text-gray-400 mt-0.5 max-w-xs truncate">{{ $member->description }}</p>
                                            @endif
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $member->updated_at->format('d M Y, h:i A') }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-3 py-3 whitespace-nowrap">
                                    @if ($member->status)
                                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700 ring-1 ring-green-600/20">Active</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-0.5 text-xs font-medium text-red-700 ring-1 ring-red-600/20">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-3 py-3 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-3">
                                        <button wire:click="edit({{ $member->id }})"
                                            class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-medium cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Edit
                                        </button>
                                        <button type="button" x-data
                                            @click="Swal.fire({
                                                title: 'Are you sure?',
                                                text: 'This member will be permanently deleted!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $wire.delete({{ $member->id }})
                                                }
                                            })"
                                            class="inline-flex items-center gap-1 text-sm text-red-500 hover:text-red-700 font-medium cursor-pointer">
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
                            <td colspan="3" class="px-3 py-8 text-center text-sm text-gray-400">
                                No members found. Click "Add New" to get started.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- =========================== Content End Here ============================ --}}
    </div>

    {{-- =======================================Modals Start Here======================================= --}}
    <div x-cloak x-data="{ modalOpen: @entangle('modalOpen') }" x-show="modalOpen" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" role="dialog" aria-modal="true"
        aria-labelledby="modalTitle">
        <div class="w-full max-w-lg rounded-xl bg-white shadow-xl overflow-hidden">
            {{-- Modal Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h2 id="modalTitle" class="text-lg font-bold text-gray-900">
                    {{ $editMode ? 'Update Member' : 'Add New Member' }}
                </h2>
                <button wire:click="modalOpen=false; $set('editMode', false)" type="button"
                    class="cursor-pointer rounded-full p-1.5 text-gray-400 transition-colors hover:bg-gray-100 hover:text-gray-600 focus:outline-none"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="px-6 py-5 max-h-[75vh] overflow-y-auto">
                <form class="space-y-4" wire:submit.prevent="save">

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="name">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="name" id="name" type="text" placeholder="Enter full name"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Designation --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="designation">
                            Designation
                        </label>
                        <input wire:model="designation" id="designation" type="text" placeholder="e.g. CEO, Director"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none px-3 py-2 text-sm" />
                        @error('designation')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="description">
                            Description
                        </label>
                        <textarea wire:model="description" id="description" rows="3"
                            placeholder="Short bio or description..."
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none px-3 py-2 text-sm resize-none"></textarea>
                        @error('description')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="status">Status</label>
                        <select wire:model="status" id="status"
                            class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none px-3 py-2 text-sm">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Photo <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="image" id="image" type="hidden" />
                        <button type="button"
                            wire:click="$dispatch('openMediaPicker', { target: 'image', multiple: false, type: 'image' })"
                            class="flex items-center justify-center gap-2 w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg text-gray-500 hover:border-indigo-400 hover:text-indigo-500 hover:bg-indigo-50 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            <span class="text-sm font-medium">{{ $image ? 'Change Photo' : 'Choose Photo' }}</span>
                        </button>
                        @if ($image)
                            <div class="mt-3 flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="relative shrink-0 group">
                                    <img src="{{ file_path($image) }}" alt="Preview"
                                        class="h-16 w-16 object-cover rounded-lg ring-1 ring-gray-200">
                                    <button type="button"
                                        wire:click.stop="removeMedia('image')"
                                        class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center shadow-md transition-colors border-2 border-white"
                                        title="Remove">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-gray-700 truncate">{{ basename(file_path($image)) }}</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Image selected</p>
                                </div>
                            </div>
                        @endif
                        @error('image')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors cursor-pointer">
                            {{ $editMode ? 'Update Member' : 'Add Member' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewire('admin.file.media-picker', ['mediapickerModal' => false])
    {{-- ========================================Modals End Here=======================================  --}}
</div>
{{-- =========================== Page Layout End Here ============================ --}}

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", {});

            const el = document.getElementById('sortable-table');
            Sortable.create(el, {
                animation: 150,
                handle: ".cursor-move",
                onEnd: function() {
                    let order = [];
                    document.querySelectorAll('#sortable-table tr').forEach((row, index) => {
                        order.push({ id: row.dataset.id, position: index + 1 });
                    });
                    Livewire.dispatch('updateOrder', { order: order });
                }
            });
        });
    </script>
@endpush
