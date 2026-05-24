<section class="connect-explore-sec relative overflow-hidden"
    style="background: linear-gradient(135deg, #111827 0%, #1a2540 50%, #0f1d2e 100%);">

    {{-- Subtle grid decoration --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04]"
        style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 60px 60px;">
    </div>

    {{-- Glow accents --}}
    <div class="pointer-events-none absolute -top-32 -left-32 w-96 h-96 rounded-full opacity-10"
        style="background: radial-gradient(circle, #0fd850, transparent 70%);"></div>
    <div class="pointer-events-none absolute -bottom-32 -right-32 w-96 h-96 rounded-full opacity-10"
        style="background: radial-gradient(circle, #0a7806, transparent 70%);"></div>

    <div class="relative wrapper py-16 md:py-24">

        {{-- Heading --}}
        <div class="text-center mb-12 md:mb-16">
            <p class="text-xs tracking-[0.35em] text-green-400 uppercase mb-3 font-medium">Get In Touch</p>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-widest text-white uppercase"
                style="font-family: 'Cormorant Garamond', serif; letter-spacing: 0.12em;">
                Connect <span class="text-green-400">&amp;</span> Explore
            </h2>
            <div class="mx-auto mt-5 h-px w-16 bg-green-500 opacity-60"></div>
        </div>

        {{-- Success State --}}
        @if ($submitted)
            <div class="max-w-lg mx-auto text-center py-10">
                <div class="w-16 h-16 rounded-full bg-green-500/20 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-2">Message Sent!</h3>
                <p class="text-gray-400 mb-8">Thank you for reaching out. Our team will get back to you shortly.</p>
                <button wire:click="resetForm"
                    class="text-sm text-green-400 border border-green-500/40 hover:border-green-400 hover:bg-green-500/10 transition px-6 py-2 rounded-sm tracking-widest uppercase cursor-pointer">
                    Send Another
                </button>
            </div>

        {{-- Form --}}
        @else
            <form wire:submit.prevent="submit"
                class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-8">

                {{-- Name --}}
                <div class="col-span-1">
                    <label class="block text-xs tracking-widest text-gray-400 uppercase mb-2">
                        Name <span class="text-green-400">*</span>
                    </label>
                    <input wire:model="name" type="text" placeholder="Your full name"
                        class="w-full bg-transparent border-0 border-b border-white/20 focus:border-green-400 text-white placeholder-gray-600 pb-2 text-sm outline-none transition-colors duration-200" />
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="col-span-1">
                    <label class="block text-xs tracking-widest text-gray-400 uppercase mb-2">
                        Phone <span class="text-green-400">*</span>
                    </label>
                    <input wire:model="phone" type="tel" placeholder="Your phone number"
                        class="w-full bg-transparent border-0 border-b border-white/20 focus:border-green-400 text-white placeholder-gray-600 pb-2 text-sm outline-none transition-colors duration-200" />
                    @error('phone')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-span-1 sm:col-span-2">
                    <label class="block text-xs tracking-widest text-gray-400 uppercase mb-2">
                        Email <span class="text-gray-600 text-xs normal-case tracking-normal">(optional)</span>
                    </label>
                    <input wire:model="email" type="email" placeholder="your@email.com"
                        class="w-full bg-transparent border-0 border-b border-white/20 focus:border-green-400 text-white placeholder-gray-600 pb-2 text-sm outline-none transition-colors duration-200" />
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="col-span-1 sm:col-span-2">
                    <label class="block text-xs tracking-widest text-gray-400 uppercase mb-2">
                        Message
                    </label>
                    <textarea wire:model="message" rows="3" placeholder="Tell us how we can help you..."
                        class="w-full bg-transparent border-0 border-b border-white/20 focus:border-green-400 text-white placeholder-gray-600 pb-2 text-sm outline-none resize-none transition-colors duration-200"></textarea>
                    @error('message')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="col-span-1 sm:col-span-2 flex justify-center mt-4">
                    <button type="submit"
                        class="group relative inline-flex items-center gap-3 px-10 py-3 text-sm font-semibold tracking-widest text-white uppercase border border-green-500/50 hover:border-green-400 hover:bg-green-500/10 transition-all duration-300 rounded-sm cursor-pointer overflow-hidden">
                        <span wire:loading.remove wire:target="submit">Send Message</span>
                        <span wire:loading wire:target="submit" class="flex items-center gap-2">
                            <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            Sending...
                        </span>
                        <svg wire:loading.remove wire:target="submit"
                            class="w-4 h-4 text-green-400 group-hover:translate-x-1 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </button>
                </div>

            </form>
        @endif

    </div>
</section>
