<section class="relative overflow-hidden" style="background:#0b0f1a;">

    <div class="flex flex-col lg:flex-row min-h-[600px]">

        {{-- ═══════════════════════════════════════════
             LEFT PANEL — image + info
        ════════════════════════════════════════════ --}}
        <div class="relative lg:w-[45%] min-h-[320px] lg:min-h-0 overflow-hidden">

            {{-- Background building image --}}
            <img src="{{ asset('assets/images/buildings/1.jpg') }}" alt="Star Unity Development"
                class="absolute inset-0 w-full h-full object-cover object-center">

            {{-- Dark gradient overlay --}}
            <div class="absolute inset-0"
                style="background: linear-gradient(160deg, rgba(10,120,6,0.55) 0%, rgba(5,10,20,0.88) 60%, rgba(5,10,20,0.97) 100%);">
            </div>

            {{-- Content --}}
            <div class="relative z-10 flex flex-col justify-between h-full p-8 sm:p-12 lg:p-14">

                {{-- Top badge --}}
                <div class="inline-flex items-center gap-2 self-start">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    <span class="text-xs text-green-300 tracking-[0.25em] uppercase font-medium">We're Available Now</span>
                </div>

                {{-- Heading block --}}
                <div class="mt-10 lg:mt-0">
                    <p class="text-green-400 text-xs tracking-[0.3em] uppercase mb-4 font-medium">Real Estate Experts</p>
                    <h2 class="text-white font-bold leading-tight mb-6"
                        style="font-family:'Cormorant Garamond',serif; font-size:clamp(2rem,4vw,3.2rem); letter-spacing:0.04em;">
                        Connect &amp;<br>
                        <span class="text-green-400">Explore</span> With Us
                    </h2>
                    <p class="text-gray-300 text-sm leading-relaxed max-w-xs">
                        Let our expert team guide you to your perfect property. Whether you're buying, investing,
                        or partnering — we're here to make it happen.
                    </p>

                    {{-- Divider --}}
                    <div class="flex items-center gap-3 my-8">
                        <div class="h-px flex-1 bg-white/10"></div>
                        <span class="text-green-500 text-lg">✦</span>
                        <div class="h-px flex-1 bg-white/10"></div>
                    </div>

                    {{-- Trust stats --}}
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white" style="font-family:'Cormorant Garamond',serif;">10+</p>
                            <p class="text-xs text-gray-400 mt-1 leading-tight">Years<br>Experience</p>
                        </div>
                        <div class="text-center border-x border-white/10">
                            <p class="text-2xl font-bold text-white" style="font-family:'Cormorant Garamond',serif;">500+</p>
                            <p class="text-xs text-gray-400 mt-1 leading-tight">Happy<br>Clients</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white" style="font-family:'Cormorant Garamond',serif;">50+</p>
                            <p class="text-xs text-gray-400 mt-1 leading-tight">Projects<br>Delivered</p>
                        </div>
                    </div>

                    {{-- Contact info --}}
                    <div class="space-y-3">
                        <a href="tel:+8801730711003"
                            class="flex items-center gap-3 text-gray-300! hover:text-green-400! transition-colors text-sm group">
                            <span class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-green-500/20 flex items-center justify-center transition-colors shrink-0">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.47 11.47 0 003.58.57 1 1 0 011 1v3.5a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.47 11.47 0 00.57 3.58 1 1 0 01-.25 1.01z"/>
                                </svg>
                            </span>
                            01730-711003 &nbsp;/&nbsp; 01335-188088
                        </a>
                        <a href="mailto:starunityrv@gmail.com"
                            class="flex items-center gap-3 text-gray-300! hover:text-green-400! transition-colors text-sm group">
                            <span class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-green-500/20 flex items-center justify-center transition-colors shrink-0">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </span>
                            starunityrv@gmail.com
                        </a>
                        <div class="flex items-start gap-3 text-gray-300 text-sm">
                            <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/>
                                </svg>
                            </span>
                            <span class="leading-relaxed">Star Shopping City (1st floor), Plot #1193, Block A, Bashundhara Riverview, Dhaka-1311</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ═══════════════════════════════════════════
             RIGHT PANEL — form
        ════════════════════════════════════════════ --}}
        <div class="flex-1 relative flex items-center justify-center px-6 py-12 sm:px-10 lg:px-16"
            style="background: linear-gradient(180deg, #0f1624 0%, #0b0f1a 100%);">

            {{-- Decorative corner accent --}}
            <div class="pointer-events-none absolute top-0 right-0 w-64 h-64 opacity-5"
                style="background: radial-gradient(circle at top right, #0fd850, transparent 70%);"></div>
            <div class="pointer-events-none absolute bottom-0 left-0 w-64 h-64 opacity-5"
                style="background: radial-gradient(circle at bottom left, #0a7806, transparent 70%);"></div>

            <div class="w-full max-w-lg relative">

                {{-- ── Success state ── --}}
                @if ($submitted)
                    <div class="text-center py-12">
                        <div class="w-20 h-20 rounded-full mx-auto mb-6 flex items-center justify-center"
                            style="background: linear-gradient(135deg, #0a7806 0%, #0fd850 100%);">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3" style="font-family:'Cormorant Garamond',serif;">
                            Message Received!
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-8">
                            Thank you for reaching out.<br>Our team will contact you within 24 hours.
                        </p>
                        <button wire:click="resetForm"
                            class="text-xs tracking-[0.25em] uppercase text-green-400 border border-green-500/30 hover:border-green-400 hover:bg-green-500/10 px-8 py-3 transition-all duration-300 cursor-pointer">
                            Send Another Inquiry
                        </button>
                    </div>

                {{-- ── Form ── --}}
                @else
                    {{-- Form header --}}
                    <div class="mb-10">
                        <p class="text-xs tracking-[0.3em] text-green-400 uppercase mb-3">Start The Conversation</p>
                        <h3 class="text-3xl font-bold text-white" style="font-family:'Cormorant Garamond',serif;">
                            Send Us A Message
                        </h3>
                        <div class="flex items-center gap-2 mt-3">
                            <div class="h-px w-8 bg-green-500"></div>
                            <div class="h-px w-3 bg-green-500/40"></div>
                        </div>
                    </div>

                    <form wire:submit.prevent="submit" class="space-y-6">

                        {{-- Name + Phone row --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            {{-- Name --}}
                            <div class="group">
                                <label class="block text-[10px] tracking-[0.2em] uppercase text-gray-300 mb-2 group-focus-within:text-green-400 transition-colors">
                                    Full Name <span class="text-green-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-0 top-1/2 -translate-y-1/2 text-gray-600 group-focus-within:text-green-400 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                        </svg>
                                    </span>
                                    <input wire:model="name" type="text" placeholder="Your full name"
                                        class="w-full bg-transparent border-b border-white/10 group-focus-within:border-green-500 text-white placeholder-gray-700 pl-7 pb-2.5 text-sm outline-none transition-colors duration-300"/>
                                </div>
                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                        <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="group">
                                <label class="block text-[10px] tracking-[0.2em] uppercase text-gray-300 mb-2 group-focus-within:text-green-400 transition-colors">
                                    Phone Number <span class="text-green-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-0 top-1/2 -translate-y-1/2 text-gray-600 group-focus-within:text-green-400 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                        </svg>
                                    </span>
                                    <input wire:model="phone" type="tel" placeholder="01XXX-XXXXXX"
                                        class="w-full bg-transparent border-b border-white/10 group-focus-within:border-green-500 text-white placeholder-gray-700 pl-7 pb-2.5 text-sm outline-none transition-colors duration-300"/>
                                </div>
                                @error('phone')
                                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                        <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="group">
                            <label class="block text-[10px] tracking-[0.2em] uppercase text-gray-300 mb-2 group-focus-within:text-green-400 transition-colors">
                                Email Address
                                <span class="normal-case tracking-normal text-gray-700 ml-1">(optional)</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-0 top-1/2 -translate-y-1/2 text-gray-600 group-focus-within:text-green-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                    </svg>
                                </span>
                                <input wire:model="email" type="email" placeholder="your@email.com"
                                    class="w-full bg-transparent border-b border-white/10 group-focus-within:border-green-500 text-white placeholder-gray-700 pl-7 pb-2.5 text-sm outline-none transition-colors duration-300"/>
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                    <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Interest selector --}}
                        <div class="group">
                            <label class="block text-[10px] tracking-[0.2em] uppercase text-gray-300 mb-3">
                                I'm Interested In
                            </label>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Flat / Apartment', 'Commercial Space', 'Land / Plot', 'Joint Venture', 'Other'] as $interest)
                                    <label class="cursor-pointer">
                                        <input type="radio" wire:model="message" value="{{ $interest }}" class="sr-only peer">
                                        <span class="inline-block px-3 py-1.5 text-xs border border-white/10 text-gray-400
                                            peer-checked:border-green-500 peer-checked:text-green-400 peer-checked:bg-green-500/10
                                            hover:border-white/30 hover:text-gray-200 transition-all duration-200 cursor-pointer">
                                            {{ $interest }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="group">
                            <label class="block text-[10px] tracking-[0.2em] uppercase text-gray-300 mb-2 group-focus-within:text-green-400 transition-colors">
                                Your Message
                            </label>
                            <div class="relative">
                                <span class="absolute left-0 top-1 text-gray-600 group-focus-within:text-green-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                                    </svg>
                                </span>
                                <textarea wire:model.defer="message" rows="3"
                                    placeholder="Tell us more about what you're looking for..."
                                    class="w-full bg-transparent border-b border-white/10 group-focus-within:border-green-500 text-white placeholder-gray-700 pl-7 pb-2.5 text-sm outline-none resize-none transition-colors duration-300"></textarea>
                            </div>
                            @error('message')
                                <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                    <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit row --}}
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5 pt-2">

                            {{-- Response time badge --}}
                            <div class="flex items-center gap-2 text-gray-300 text-xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                Typical response within 24 hours
                            </div>

                            {{-- Button --}}
                            <button type="submit"
                                class="group relative inline-flex items-center gap-3 px-8 py-3.5 text-xs font-semibold tracking-[0.2em] uppercase text-white overflow-hidden cursor-pointer transition-all duration-300"
                                style="background: linear-gradient(135deg, #0a7806 0%, #0fd850 100%);">
                                <span class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                    style="background: linear-gradient(135deg, #0fd850 0%, #0a7806 100%);"></span>
                                <span class="relative flex items-center gap-3">
                                    <span wire:loading.remove wire:target="submit">Send Inquiry</span>
                                    <span wire:loading wire:target="submit" class="flex items-center gap-2">
                                        <svg class="animate-spin w-3.5 h-3.5" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                        </svg>
                                        Sending...
                                    </span>
                                    <svg wire:loading.remove wire:target="submit"
                                        class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"/>
                                    </svg>
                                </span>
                            </button>

                        </div>

                    </form>
                @endif

            </div>
        </div>

    </div>

</section>
