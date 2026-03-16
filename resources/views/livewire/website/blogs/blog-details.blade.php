<div>

    <section class="blog">
        <div class="md:w-[70%] mx-auto! mt-4!">


            <div class="wrapper">
                <div class="header">
                    <img src="{{ file_path($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full ">
                    <h1 class="text-2xl py-2!">
                        {{ $blog->title }}
                    </h1>
                </div>
            </div>
            <div class="wrapper">
                <div class="details mt-4!">
                    {!! $blog->description !!}
                </div>
            </div>
        </div>

    </section>
</div>
