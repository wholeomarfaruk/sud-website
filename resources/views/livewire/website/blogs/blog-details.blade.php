@section('meta_title', $blog->title . ' - Blogs')


@push('meta_data')
    <meta name="description" content="{{ $blog->meta_description }}">


    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
           noindex, nofollow
           index, nofollow
           noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="{{ $blog->meta_title }} - Blogs - Star Unity Development Ltd.">
    <meta property="og:description" content="{{ $blog->meta_description }}">
    <meta property="og:image" content="{{ file_path($blog->meta_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->meta_title }} - Blogs - Star Unity Development Ltd.">
    <meta name="twitter:description" content="{{ $blog->meta_description }}">
    <meta name="twitter:image" content="{{ file_path($blog->meta_image) }}">
    
@endpush

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
