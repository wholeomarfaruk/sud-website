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
</div>
