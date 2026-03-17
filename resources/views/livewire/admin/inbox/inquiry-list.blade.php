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
        {{-- ======================== Content Start From Here ======================== --}}
    {{-- Filters / Search --}}
    <div class="flex flex-wrap gap-4 px-4 py-4">
        <input type="text" wire:model.live.debounce="search" placeholder="Search by Name, Email, Phone"
            class="border p-2 rounded w-64">

        <select wire:model.live="status" class="border p-2 rounded">
            <option value="">All Status</option>
            <option value="new">New</option>
            <option value="read">Read</option>
            <option value="replied">Replied</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm mx-4 min-h-[70vh]">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead>
                <tr class="text-gray-900 font-medium">
                    <th class="px-3 py-2 text-left">Name</th>
                    <th class="px-3 py-2 text-left">Email / Phone</th>
                    <th class="px-3 py-2 text-left">Source</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($inquiries as $inquiry)
                    <tr>
                        <td class="px-3 py-2">{{ $inquiry->name }}</td>
                        <td class="px-3 py-2">
                            {{ $inquiry->email }}<br>{{ $inquiry->phone }}
                        </td>
                        <td class="px-3 py-2">{{ $inquiry->source_page }}</td>
                        <td class="px-3 py-2 text-center">
                            <span class="px-2 py-1 rounded text-xs
                                {{ $inquiry->status == 'new' ? 'bg-red-100 text-red-600' : '' }}
                                {{ $inquiry->status == 'read' ? 'bg-yellow-100 text-yellow-600' : '' }}
                                {{ $inquiry->status == 'replied' ? 'bg-green-100 text-green-600' : '' }}">
                                {{ $inquiry->status }}
                            </span>
                        </td>
                        <td class="px-3 py-2 text-center flex justify-center gap-2">
                            <button wire:click="viewInquiry({{ $inquiry->id }})"
                                class="text-blue-600 hover:text-blue-700 flex gap-1 items-center">
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
                                class="text-red-500 hover:text-red-600 flex gap-1 items-center">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-3 py-2 text-center text-gray-500">
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

        {{-- =========================== Content End Here ============================ --}}

    </div>
    {{-- =======================================Modals Start Here======================================= --}}

    {{-- Modal --}}
    <div x-cloak x-data="{ modalOpen: @entangle('modalOpen') }" x-show="modalOpen" x-transition
        class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog" aria-modal="true">
        <div class="w-full md:w-lg rounded-lg bg-white p-6 shadow-lg overflow-auto">
            <div class="flex items-start justify-between">
                <h2 class="text-xl font-bold text-gray-900">Inquiry Details</h2>
                <button @click="modalOpen = false"
                    class="cursor-pointer -mt-4 -me-4 rounded-full p-2 text-gray-400 hover:bg-gray-50 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-4 space-y-3">
                @if($selectedInquiry)
                    <p><strong>Name:</strong> {{ $selectedInquiry->name }}</p>
                    <p><strong>Email:</strong> {{ $selectedInquiry->email }}</p>
                    <p><strong>Phone:</strong> {{ $selectedInquiry->phone }}</p>
                    <p><strong>Subject:</strong> {{ $selectedInquiry->subject }}</p>
                    <p><strong>Message:</strong><br>{{ $selectedInquiry->message }}</p>
                    <p><strong>Page:</strong> {{ $selectedInquiry->source_page }}</p>
                    <p><strong>URL:</strong> <a href="{{ $selectedInquiry->source_url }}" class="text-blue-600" target="_blank">{{ $selectedInquiry->source_url }}</a></p>
                    <p><strong>Status:</strong> {{ $selectedInquiry->status }}</p>
                    <p><strong>Received:</strong> {{ $selectedInquiry->created_at->format('d-m-Y h:i A') }}</p>
                @endif
            </div>
        </div>
    </div>
    {{-- =======================================Modals End Here======================================= --}}

</div>
