<div>


<div class="p-6 bg-white rounded shadow">

    <h2 class="text-xl font-bold mb-4">Upload Files</h2>

    <!-- File Input -->
    <input type="file" multiple wire:model="files" class="border p-2 rounded w-full mb-4">

    <!-- Caption -->
    <input type="text" wire:model="fileCaption" placeholder="Caption (optional)"
        class="border p-2 rounded w-full mb-4">

    <!-- Loading -->
    <div wire:loading wire:target="files" class="text-blue-500 mb-2">Uploading...</div>

    <!-- Uploaded Files Preview -->
    <div class="grid grid-cols-3 gap-4">
        @foreach($uploadedFiles as $file)
            <div class="relative group border p-2 rounded">
                @if($file['type'] === 'image')
                    <img src="{{ asset('storage/' . $file['path']) }}" alt="{{ $file['name'] }}" class="rounded cursor-pointer"
                        onclick="openModal('{{ asset('storage/' . $file['path']) }}')">
                @else
                    <div class="flex items-center justify-center h-32 bg-gray-100 rounded cursor-pointer"
                        onclick="openModal('{{ asset('storage/' . $file['path']) }}')">
                        <span class="text-sm">{{ $file['name'] }}</span>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div id="previewModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
    <div class="bg-white rounded p-4 max-w-3xl w-full relative">
        <button class="absolute top-2 right-2 text-gray-700 text-xl font-bold" onclick="closeModal()">×</button>
        <img id="modalImage" src="" alt="Preview" class="max-h-[80vh] mx-auto rounded">
    </div>
</div>
</div>
@push('scripts')

<script>
function openModal(src) {
    const modal = document.getElementById('previewModal');
    const img = document.getElementById('modalImage');
    img.src = src;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('previewModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endpush
