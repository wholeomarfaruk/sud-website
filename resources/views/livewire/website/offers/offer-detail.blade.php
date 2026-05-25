@section('bodyClass', 'offer-detail-page')
@section('meta_title', $offer->title . ' - Offers')


@push('meta_data')
    <meta name="description" content="{{ $offer->meta_description }}">
    <meta name="keywords"
        content="property offers, real estate deals, residential property discounts, commercial property offers, property promotions, Star Unity Development Ltd offers, buy property deals, property investment offers">


    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
           noindex, nofollow
           index, nofollow
           noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="{{ $offer->meta_title }} - Offers - Star Unity Development Ltd.">
    <meta property="og:description" content="{{ $offer->meta_description }}">
    <meta property="og:image" content="{{ file_path($offer->meta_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $offer->meta_title }} - Offers - Star Unity Development Ltd.">
    <meta name="twitter:description" content="{{ $offer->meta_description }}">
    <meta name="twitter:image" content="{{ file_path($offer->meta_image) }}">
    
@endpush
<div>

    <section class="offer">
        <div class="md:w-[70%] mx-auto! mt-4!">


            <div class="wrapper">
                <div class="header">
                    <img src="{{ file_path($offer->featured_image) }}" alt="{{ $offer->title }}" class="w-full ">
                    <h1 class="text-2xl mt-3">
                        {{ $offer->title }}
                    </h1>
                </div>
            </div>
            <div class="wrapper">
                <div class="details mt-4!">
                    {!! $offer->description !!}
                </div>



            </div>
        </div>

    </section>
    <section class="section md:w-[70%] mx-auto! mt-4!">

        <div class="wrapper mt-8">
            <div class="section-header w-full!">
                <h2 class="section-title">এই অফারে কি আপনি আগ্রহী?</h2>
                <p>
                    আমরা আপনাকে সেরা সেবা দিতে প্রতিশ্রুতিবদ্ধ। কোনো প্রশ্ন থাকলে বা বিস্তারিত জানতে এখনই যোগাযোগ করুন
                    <br>—আমরা আপনার জন্য অপেক্ষা করছি।
                </p>
            </div>
            <form wire:submit.prevent="submit" class="custom-form">
                <input type="hidden" wire:model="source_page">
                <div class="col-2">
                    <div class="form-group">
                        <label for="offer_name">আপনার নাম <span class="text-red-600">*</span></label>
                        <input wire:model="name" type="text" class="form-control" id="offer_name"
                            placeholder="নাম লিখুন">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="offer_phone">ফোন নাম্বার <span class="text-red-600">*</span></label>
                        <input wire:model="phone" type="tel" class="form-control" id="offer_phone"
                            placeholder="ফোন নাম্বার লিখুন">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="offer_email">ইমেল ঠিকানা <span class="text-gray-400 text-xs">(ঐচ্ছিক)</span></label>
                        <input wire:model="email" type="email" class="form-control" id="offer_email"
                            placeholder="example@gmail.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="offer_subject">বিষয় <span class="text-gray-400 text-xs">(ঐচ্ছিক)</span></label>
                        <input wire:model="subject" type="text" class="form-control" id="offer_subject"
                            placeholder="বিষয় লিখুন">
                        @error('subject')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="offer_message">মেসেজ <span class="text-gray-400 text-xs">(ঐচ্ছিক)</span></label>
                    <textarea wire:model="message" class="form-control" placeholder="আপনার মেসেজ লিখুন..." rows="4"
                        id="offer_message"></textarea>
                    @error('message')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" wire:loading.attr="disabled"
                    class="submit-btn border border-gray-300! md:w-auto! px-10!">
                    <span wire:loading.remove wire:target="submit">
                        সাবমিট করুন
                    </span>
                    <span wire:loading wire:target="submit">
                        পাঠানো হচ্ছে...
                    </span>
                </button>
            </form>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', data => {
                Swal.fire({
                    title: data[0].title,
                    text: data[0].message,
                    icon: data[0].icon,
                });
            });
        });
    </script>
@endpush
