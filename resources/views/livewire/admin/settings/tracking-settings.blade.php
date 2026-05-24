{{-- ======================== Page Layout Start ======================== --}}
<div x-data="{ tab: @entangle('activeTab') }"
     x-init="$store.pageName = { name: 'Tracking & Code Injection' }">

    {{-- ── Page Header ── --}}
    <div class="flex flex-wrap justify-between gap-6">
        <h1 class="text-gray-500 text-lg font-bold" x-cloak x-text="$store.pageName?.name ?? ''"></h1>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="clearCache"
                class="inline-flex items-center gap-2 rounded border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-400 transition cursor-pointer">
                <svg wire:loading.remove wire:target="clearCache" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
                <svg wire:loading wire:target="clearCache" class="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                Clear Cache
            </button>
            <nav>
                <ol class="flex items-center gap-1.5">
                    <li>
                        <a class="inline-flex items-center gap-1.5 text-sm text-gray-500"
                           href="{{ route('admin.dashboard') }}">
                            Dashboard
                            <svg width="17" height="16" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"/>
                            </svg>
                        </a>
                    </li>
                    <li class="text-sm text-gray-800" x-text="$store.pageName?.name ?? ''"></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ── Security Notice ── --}}
    <div class="mt-4 flex items-start gap-3 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3">
        <svg class="mt-0.5 w-4 h-4 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
        </svg>
        <p class="text-xs text-amber-700 leading-relaxed">
            <strong>Security Notice:</strong> Scripts entered here are rendered raw into your page HTML.
            Only paste code from trusted sources (Google, Meta, TikTok official dashboards).
            Never paste unknown third-party scripts — they have full access to your visitors' browsers.
        </p>
    </div>

    {{-- ── Main Card ── --}}
    <div class="mt-4 w-full bg-white rounded-lg min-h-[80vh]">

        {{-- ── Tab Navigation ── --}}
        <div class="border-b border-gray-200 px-4">
            <nav class="flex gap-1 -mb-px">
                @foreach([
                    ['id' => 'analytics', 'label' => 'Analytics', 'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z'],
                    ['id' => 'seo',       'label' => 'SEO Verification', 'icon' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z'],
                    ['id' => 'custom',    'label' => 'Custom Code', 'icon' => 'M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5'],
                ] as $t)
                    <button type="button" @click="tab = '{{ $t['id'] }}'"
                        :class="tab === '{{ $t['id'] }}' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="inline-flex items-center gap-2 border-b-2 px-4 py-3 text-sm font-medium transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $t['icon'] }}"/>
                        </svg>
                        {{ $t['label'] }}
                    </button>
                @endforeach
            </nav>
        </div>

        <form wire:submit.prevent="save" class="p-6">

            {{-- ════════════════════════════════════════
                 TAB 1 — ANALYTICS
            ════════════════════════════════════════ --}}
            <div x-show="tab === 'analytics'" x-cloak>

                <p class="text-xs text-gray-400 mb-6">
                    Paste your tracking IDs or full code snippets. Leave blank to disable.
                </p>

                {{-- GTM --}}
                <div class="mb-8 rounded-lg border border-gray-100 bg-gray-50 p-5">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded bg-blue-600 text-white text-[10px] font-bold">G</span>
                        <h3 class="text-sm font-semibold text-gray-800">Google Tag Manager</h3>
                    </div>
                    <p class="text-xs text-gray-500 mb-4">
                        Enter only your Container ID. The GTM head snippet and body noscript are auto-generated in the layout.
                    </p>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Container ID <span class="text-gray-400 font-normal">(e.g. GTM-XXXXXXX)</span>
                        </label>
                        <input wire:model.defer="gtm_id" type="text" placeholder="GTM-XXXXXXX"
                            class="w-full max-w-xs rounded border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                        @error('gtm_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Meta Pixel --}}
                <div class="mb-8 rounded-lg border border-gray-100 bg-gray-50 p-5">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded bg-[#1877F2] text-white text-[10px] font-bold">f</span>
                        <h3 class="text-sm font-semibold text-gray-800">Meta (Facebook) Pixel</h3>
                    </div>
                    <p class="text-xs text-gray-500 mb-4">
                        Enter your Pixel ID for auto-generated code, or paste the full snippet below.
                        If both are filled, the full snippet takes priority.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Pixel ID</label>
                            <input wire:model.defer="meta_pixel_id" type="text" placeholder="1234567890123456"
                                class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                            @error('meta_pixel_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Full Pixel Code Snippet <span class="text-gray-400 font-normal">(optional override — paste from Meta Events Manager)</span>
                        </label>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'meta_pixel_head', 'placeholder' => "<!-- Meta Pixel Code -->\n<script>..."])
                        @error('meta_pixel_head') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- TikTok Pixel --}}
                <div class="mb-8 rounded-lg border border-gray-100 bg-gray-50 p-5">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded bg-black text-white text-[10px] font-bold">T</span>
                        <h3 class="text-sm font-semibold text-gray-800">TikTok Pixel</h3>
                    </div>
                    <p class="text-xs text-gray-500 mb-4">
                        Enter your Pixel ID for auto-generated code, or paste the full snippet below.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Pixel ID</label>
                            <input wire:model.defer="tiktok_pixel_id" type="text" placeholder="CXXXXXXXXXXXXXXXXXX"
                                class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                            @error('tiktok_pixel_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Full TikTok Pixel Snippet <span class="text-gray-400 font-normal">(optional override)</span>
                        </label>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'tiktok_pixel_head', 'placeholder' => "<!-- TikTok Pixel Code -->\n<script>..."])
                        @error('tiktok_pixel_head') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>

            {{-- ════════════════════════════════════════
                 TAB 2 — SEO VERIFICATION
            ════════════════════════════════════════ --}}
            <div x-show="tab === 'seo'" x-cloak>

                <p class="text-xs text-gray-400 mb-6">
                    Paste only the <code class="bg-gray-100 px-1 rounded">content</code> attribute value from the verification meta tag, not the full tag.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Google --}}
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded bg-white border border-gray-200 text-[10px] font-bold text-blue-500">G</span>
                            <h3 class="text-sm font-semibold text-gray-800">Google Search Console</h3>
                        </div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Verification content value
                        </label>
                        <input wire:model.defer="google_verification" type="text"
                            placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                            class="w-full rounded border border-gray-300 px-3 py-2 text-sm font-mono focus:border-indigo-500 focus:outline-none">
                        <p class="mt-2 text-xs text-gray-400">
                            From: <code class="bg-gray-100 px-1">&lt;meta name="google-site-verification" content="<strong>VALUE</strong>"&gt;</code>
                        </p>
                        @error('google_verification') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Facebook --}}
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded bg-[#1877F2] text-white text-[10px] font-bold">f</span>
                            <h3 class="text-sm font-semibold text-gray-800">Facebook Domain Verification</h3>
                        </div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Verification content value
                        </label>
                        <input wire:model.defer="facebook_verification" type="text"
                            placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                            class="w-full rounded border border-gray-300 px-3 py-2 text-sm font-mono focus:border-indigo-500 focus:outline-none">
                        <p class="mt-2 text-xs text-gray-400">
                            From: <code class="bg-gray-100 px-1">&lt;meta name="facebook-domain-verification" content="<strong>VALUE</strong>"&gt;</code>
                        </p>
                        @error('facebook_verification') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                </div>

            </div>

            {{-- ════════════════════════════════════════
                 TAB 3 — CUSTOM CODE
            ════════════════════════════════════════ --}}
            <div x-show="tab === 'custom'" x-cloak>

                <p class="text-xs text-gray-400 mb-6">
                    Inject any custom script, style, or markup. Use the injection point badges to know exactly where each block lands in the HTML.
                </p>

                {{-- Injection map --}}
                <div class="mb-6 rounded-lg border border-dashed border-gray-200 bg-gray-50 p-4">
                    <p class="text-xs font-semibold text-gray-600 mb-2">Injection Points</p>
                    <div class="flex flex-wrap gap-3 text-xs">
                        <span class="inline-flex items-center gap-1 rounded bg-purple-100 text-purple-700 px-2 py-1">
                            <span class="font-mono font-bold">&lt;head&gt;</span> Custom CSS, Custom JS, Head Scripts
                        </span>
                        <span class="inline-flex items-center gap-1 rounded bg-blue-100 text-blue-700 px-2 py-1">
                            <span class="font-mono font-bold">&lt;body&gt;</span> Body Start Scripts
                        </span>
                        <span class="inline-flex items-center gap-1 rounded bg-green-100 text-green-700 px-2 py-1">
                            <span class="font-mono font-bold">&lt;/body&gt;</span> Body End Scripts
                        </span>
                    </div>
                </div>

                <div class="space-y-6">

                    {{-- Custom CSS --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold bg-purple-100 text-purple-700 px-2 py-0.5 rounded font-mono">&lt;head&gt;</span>
                            <label class="text-sm font-medium text-gray-800">Custom CSS</label>
                        </div>
                        <p class="text-xs text-gray-400 mb-2">Wrapped in <code class="bg-gray-100 px-1">&lt;style&gt;</code> automatically. Write plain CSS rules.</p>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'custom_css', 'placeholder' => ".my-class {\n  color: red;\n}"])
                        @error('custom_css') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Custom JS --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold bg-purple-100 text-purple-700 px-2 py-0.5 rounded font-mono">&lt;head&gt;</span>
                            <label class="text-sm font-medium text-gray-800">Custom JS</label>
                        </div>
                        <p class="text-xs text-gray-400 mb-2">Wrapped in <code class="bg-gray-100 px-1">&lt;script&gt;</code> automatically. Write plain JS.</p>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'custom_js', 'placeholder' => "console.log('Hello');"])
                        @error('custom_js') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Head Scripts --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold bg-purple-100 text-purple-700 px-2 py-0.5 rounded font-mono">&lt;head&gt;</span>
                            <label class="text-sm font-medium text-gray-800">Head Scripts</label>
                        </div>
                        <p class="text-xs text-gray-400 mb-2">Full HTML tags (e.g. <code class="bg-gray-100 px-1">&lt;script src="..."&gt;&lt;/script&gt;</code> or <code class="bg-gray-100 px-1">&lt;link rel="..."&gt;</code>).</p>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'head_scripts', 'placeholder' => '<script src="https://example.com/lib.js"></script>'])
                        @error('head_scripts') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Body Start --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-2 py-0.5 rounded font-mono">&lt;body&gt;</span>
                            <label class="text-sm font-medium text-gray-800">Body Start Scripts</label>
                        </div>
                        <p class="text-xs text-gray-400 mb-2">Injected immediately after the opening <code class="bg-gray-100 px-1">&lt;body&gt;</code> tag.</p>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'body_start_scripts', 'placeholder' => '<!-- e.g. GTM noscript fallback, chat widgets -->'])
                        @error('body_start_scripts') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Body End --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-0.5 rounded font-mono">&lt;/body&gt;</span>
                            <label class="text-sm font-medium text-gray-800">Body End Scripts</label>
                        </div>
                        <p class="text-xs text-gray-400 mb-2">Injected just before the closing <code class="bg-gray-100 px-1">&lt;/body&gt;</code> tag.</p>
                        @include('livewire.admin.settings._code-textarea', ['field' => 'body_end_scripts', 'placeholder' => '<!-- e.g. live chat, survey widgets, deferred scripts -->'])
                        @error('body_end_scripts') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

            {{-- ── Footer Actions ── --}}
            <div class="mt-8 flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 pt-6">

                <button type="button" wire:click="clearCache"
                    class="inline-flex items-center gap-2 rounded border border-gray-300 bg-white px-4 py-2 text-xs font-medium text-gray-600 hover:bg-gray-50 transition cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                    </svg>
                    Clear Cache
                </button>

                <div class="flex items-center gap-4">
                    @if($saved)
                        <span class="inline-flex items-center gap-1.5 text-xs text-green-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            Saved successfully
                        </span>
                    @endif
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded bg-indigo-600 px-6 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition cursor-pointer">
                        <span wire:loading.remove wire:target="save">Save Settings</span>
                        <span wire:loading wire:target="save" class="flex items-center gap-2">
                            <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            Saving...
                        </span>
                    </button>
                </div>

            </div>

        </form>
    </div>

</div>
