@section('bodyClass', 'offers-page')
@section('meta_title','Offers')


@push('meta_data')
    
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
