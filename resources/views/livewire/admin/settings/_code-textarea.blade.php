{{--
    Reusable code editor textarea.
    Variables: $field (wire:model field name), $placeholder (string)
--}}
<div x-data="{ copied: false }" class="relative group">
    <textarea
        wire:model.defer="{{ $field }}"
        rows="6"
        placeholder="{{ $placeholder ?? '' }}"
        spellcheck="false"
        class="w-full rounded border border-gray-200 bg-gray-900 px-4 py-3 font-mono text-xs text-green-300
               placeholder-gray-600 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500
               resize-y leading-relaxed"
    ></textarea>

    {{-- Copy button --}}
    <button type="button"
        x-on:click="
            navigator.clipboard.writeText($el.previousElementSibling.value);
            copied = true;
            setTimeout(() => copied = false, 2000);
        "
        class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity
               rounded bg-gray-700 hover:bg-gray-600 px-2 py-1 text-[10px] text-gray-300 cursor-pointer">
        <span x-show="!copied">Copy</span>
        <span x-show="copied" x-cloak class="text-green-400">Copied!</span>
    </button>
</div>
