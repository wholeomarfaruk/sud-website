<div x-data x-init="$store.pageName = { name: 'Inbox', slug: 'inbox' }">

    {{-- Page Header --}}
    <div class="flex flex-wrap justify-between gap-6">
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''"></h1>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500"
                        href="{{ route('admin.dashboard') }}">
                        Dashboard
                        <svg class="stroke-current" width="17" height="16" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-gray-800" x-text="$store.pageName?.name ?? ''"></li>
            </ol>
        </nav>
    </div>
    {{-- ======================== Page Header End Here ======================== --}}

    <div class="flex-1 w-full bg-white rounded-lg min-h-[80vh]">

        {{-- Filters Row --}}
        <div class="flex flex-wrap items-end gap-3 px-4 pt-4 pb-3 border-b border-gray-100">

            {{-- Search --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs text-gray-500 font-medium">Search</label>
                <input type="text" wire:model.live.debounce="search"
                    placeholder="Name, Email, Phone"
                    class="border border-gray-300 rounded px-3 py-1.5 text-sm w-52 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            {{-- Status --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs text-gray-500 font-medium">Status</label>
                <select wire:model.live="status"
                    class="border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="new">New</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
                </select>
            </div>

            {{-- Source --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs text-gray-500 font-medium">Source</label>
                <select wire:model.live="source"
                    class="border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <option value="">All Sources</option>
                    @foreach($sources as $src)
                        <option value="{{ $src }}">{{ $src }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Date From --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs text-gray-500 font-medium">From</label>
                <input type="date" wire:model.live="dateFrom"
                    class="border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            {{-- Date To --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs text-gray-500 font-medium">To</label>
                <input type="date" wire:model.live="dateTo"
                    class="border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            {{-- Reset --}}
            <button wire:click="resetFilters"
                class="self-end px-3 py-1.5 text-sm rounded border border-gray-300 text-gray-600 hover:bg-gray-100 transition cursor-pointer">
                Reset
            </button>

            {{-- Spacer --}}
            <div class="flex-1"></div>

            {{-- Export Button --}}
            <button wire:click="exportExcel"
                wire:loading.attr="disabled"
                class="self-end inline-flex items-center gap-2 px-4 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded shadow transition cursor-pointer disabled:opacity-60">
                <span wire:loading.remove wire:target="exportExcel">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </span>
                <span wire:loading wire:target="exportExcel">
                    <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                </span>
                Export Excel
            </button>

        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4 mt-4 min-h-[65vh]">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead>
                    <tr class="text-gray-900 font-medium bg-gray-50">
                        <th class="px-3 py-2 text-left text-sm">#</th>
                        <th class="px-3 py-2 text-left text-sm">Name</th>
                        <th class="px-3 py-2 text-left text-sm">Email / Phone</th>
                        <th class="px-3 py-2 text-left text-sm">Source</th>
                        <th class="px-3 py-2 text-left text-sm">Date</th>
                        <th class="px-3 py-2 text-center text-sm">Status</th>
                        <th class="px-3 py-2 text-center text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-3 py-2 text-sm text-gray-500">{{ $inquiry->id }}</td>
                            <td class="px-3 py-2 text-sm font-medium">{{ $inquiry->name }}</td>
                            <td class="px-3 py-2 text-sm text-gray-600">
                                {{ $inquiry->email }}<br>{{ $inquiry->phone }}
                            </td>
                            <td class="px-3 py-2 text-sm">
                                <span class="inline-block bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded">
                                    {{ $inquiry->source_page ?? '—' }}
                                </span>
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-500 whitespace-nowrap">
                                {{ $inquiry->created_at->format('d M Y') }}<br>
                                <span class="text-gray-400">{{ $inquiry->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-3 py-2 text-center">
                                <span class="px-2 py-1 rounded text-xs font-medium
                                    {{ $inquiry->status === 'new'     ? 'bg-red-100 text-red-600'    : '' }}
                                    {{ $inquiry->status === 'read'    ? 'bg-yellow-100 text-yellow-600' : '' }}
                                    {{ $inquiry->status === 'replied' ? 'bg-green-100 text-green-600' : '' }}">
                                    {{ $inquiry->status }}
                                </span>
                            </td>
                            <td class="px-3 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <button wire:click="viewInquiry({{ $inquiry->id }})"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex gap-1 items-center cursor-pointer">
                                        View
                                    </button>

                                    <button x-data @click="
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: 'This inquiry will be permanently deleted!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete!'
                                        }).then((result) => {
                                            if(result.isConfirmed){
                                                $wire.delete({{ $inquiry->id }})
                                            }
                                        })
                                    "
                                        class="text-red-500 hover:text-red-600 text-sm flex gap-1 items-center cursor-pointer">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-3 py-10 text-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                No inquiries found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-3">
                {{ $inquiries->links() }}
            </div>
        </div>

    </div>
    {{-- ======================== Content End Here ======================== --}}

    {{-- View Modal --}}
    <div x-cloak x-data="{ modalOpen: @entangle('modalOpen') }" x-show="modalOpen" x-transition
        class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog" aria-modal="true">
        <div class="w-full md:w-lg rounded-lg bg-white p-6 shadow-lg overflow-auto max-h-[90vh]">
            <div class="flex items-start justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Inquiry Details</h2>
                <button @click="modalOpen = false"
                    class="cursor-pointer -mt-4 -me-4 rounded-full p-2 text-gray-400 hover:bg-gray-50 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            @if($selectedInquiry)
            <div class="space-y-2 text-sm">
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Name</span>
                    <span class="text-gray-800">{{ $selectedInquiry->name }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Email</span>
                    <span class="text-gray-800">{{ $selectedInquiry->email }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Phone</span>
                    <span class="text-gray-800">{{ $selectedInquiry->phone }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Subject</span>
                    <span class="text-gray-800">{{ $selectedInquiry->subject }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Message</span>
                    <span class="text-gray-800 whitespace-pre-wrap">{{ $selectedInquiry->message }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Source</span>
                    <span class="inline-block bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded">{{ $selectedInquiry->source_page }}</span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">URL</span>
                    <a href="{{ $selectedInquiry->source_url }}" class="text-blue-600 underline break-all" target="_blank">{{ $selectedInquiry->source_url }}</a>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Status</span>
                    <span class="px-2 py-0.5 rounded text-xs font-medium
                        {{ $selectedInquiry->status === 'new'     ? 'bg-red-100 text-red-600'    : '' }}
                        {{ $selectedInquiry->status === 'read'    ? 'bg-yellow-100 text-yellow-600' : '' }}
                        {{ $selectedInquiry->status === 'replied' ? 'bg-green-100 text-green-600' : '' }}">
                        {{ $selectedInquiry->status }}
                    </span>
                </div>
                <div class="flex gap-2">
                    <span class="w-28 font-semibold text-gray-600 shrink-0">Received</span>
                    <span class="text-gray-800">{{ $selectedInquiry->created_at->format('d-m-Y h:i A') }}</span>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>
