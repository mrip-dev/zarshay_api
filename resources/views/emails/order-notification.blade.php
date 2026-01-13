@component('mail::layout')
    {{-- Custom Header --}}
  @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ $message->embed(public_path('assets/images/logo_icon/logo.png')) }}"
                 alt="Zarshy"
                 height="45"
                 style="height:45px; display:block; margin:0 auto;">
        @endcomponent
    @endslot

    @if ($for === 'admin')
        # New Order Received
    @else
        # Thank You! Your Order Has Been Placed
    @endif

    **Invoice:** {{ $sale->invoice_no }}  
    **Customer:** {{ $sale->customer_name }}  
    **Phone:** {{ $sale->customer_phone }}  
    **Address:** {{ $sale->customer_address }}  
    **Status:** {{ $sale->status }}

    ## Order Summary
    **Total Price:** {{ $sale->total_price }}  
    **Discount:** {{ $sale->discount_amount }}  
    **Final Amount:** {{ $sale->receivable_amount }}

    ## Products
    @foreach ($sale->saleDetails as $item)
    - **{{ $item->product->name }}**  
      Quantity: {{ $item->quantity }}  
      Price: {{ $item->price }}  
      Total: {{ $item->total }}
    @endforeach

    @if ($for === 'customer')
    ---
    ### We will contact you soon regarding delivery.
    @endif

    {{-- YOUR CUSTOM FOOTER ONLY --}}
    @slot('footer')
        @component('mail::footer')
            <div style="text-align: center; color: #888; font-size: 12px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                © {{ date('Y') }} Zarshy. All rights reserved.
            </div>
        @endcomponent
    @endslot
@endcomponent