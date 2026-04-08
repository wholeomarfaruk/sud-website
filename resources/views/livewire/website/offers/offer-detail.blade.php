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
                <h2 class="section-title">Are you interested in this offer?</h2>
                <p>
                    আমরা আপনাকে সেরা সেবা দিতে প্রতিশ্রুতিবদ্ধ। কোনো প্রশ্ন থাকলে বা বিস্তারিত জানতে এখনই যোগাযোগ করুন
                    <br>—আমরা আপনার জন্য অপেক্ষা করছি।
                </p>
            </div>
            <form wire:submit.prevent="submit" class="custom-form">
                <input type="hidden" name="source_page" value="contact" wire:model="source_page">
                <div class="col-2">
                    <div class="form-group">
                        <label for="floatingInput ">আপনার নাম <span class="text-red-600">*</span></label>
                        <input wire:model="name" type="text" class="form-control" id="floatingInput"
                            placeholder="নাম লিখুন" name="name" required="">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="floatingInput ">ফোন নাম্বার <span class="text-red-600">*</span></label>
                        <input wire:model="phone" type="text" class="form-control" id="floatingInput"
                            placeholder="ফোন নাম্বার লিখুন" name="phone" required="">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-2">

                    <div class="form-group">
                        <label for="floatingInput ">ইমেল ঠিকানা (ঐচ্ছিক)</label>
                        <input wire:model="email" type="text" class="form-control" id="floatingInput"
                            placeholder="example@gmail.com" name="email">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="floatingInput ">বিষয় মেসেজ (ঐচ্ছিক)</label>
                        <input wire:model="subject" type="text" class="form-control" id="floatingInput"
                            placeholder="বিষয় লিখুন" name="subject" required="">
                        @error('subject')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="floatingTextarea">মেসেজ (ঐচ্ছিক)</label>
                    <textarea wire:model="message" class="form-control" placeholder="মেসেজ লিখুন" rows="3" id="floatingTextarea"
                        name="message"></textarea>
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
                        মেসেজ পাঠানো হচ্ছে...
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
                    icon: data[0].type,
                });
            });
        });
    </script>
@endpush
