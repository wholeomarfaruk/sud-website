@section('bodyClass', 'offers-page')
@section('meta_title', 'Offers')


@push('meta_data')
<meta name="description" content="Explore exclusive property offers and deals from Star Unity Development Ltd. Find special discounts on residential and commercial properties with modern designs and exceptional value.">
<meta name="keywords" content="property offers, real estate deals, residential property discounts, commercial property offers, property promotions, Star Unity Development Ltd offers, buy property deals, property investment offers">


  <!-- Indexing (VERY IMPORTANT) -->
  <meta name="robots" content="index, follow">
  <!-- Alternatives:
       noindex, nofollow
       index, nofollow
       noindex, follow -->

  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}" />

  <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
  <meta property="og:title" content="Offers - Star Unity Development Ltd.">
<meta property="og:description" content="Explore exclusive property offers and deals from Star Unity Development Ltd. Find special discounts on residential and commercial properties with modern designs and exceptional value.">
<meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png')}}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Star Unity Development Ltd.">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Offers - Star Unity Development Ltd.">
  <meta name="twitter:description" content="Explore exclusive property offers and deals from Star Unity Development Ltd. Find special discounts on residential and commercial properties with modern designs and exceptional value.">
  <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png')}}">
@endpush
<div>

        <section class="offer">
            <div class="wrapper">
                <div class="section-header offer_h">
                    <h1>Current Offer</h1>
                </div>
                <div class="grid-box">
                    @if ($offers && $offers->count()>0)
                    @foreach ($offers as $offer_item)


                      <div class="offer_img">
                        <a href="{{ route('offers.details', $offer_item->id) }}">
                            <img src="{{ file_path($offer_item->featured_image) }}" class="w-100" alt="">
                            <h3> {{ $offer_item->title }}</h3>
                        </a>
                    </div>
                    @endforeach

                    @endif


                </div>
            </div>

        </section>
            <section class="cta-section">
        
    </section>
</div>
