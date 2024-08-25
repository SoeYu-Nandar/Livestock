<x-layout>
<x-card-wrapper>
    @if(session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
    <div class="text-center">
    <h4 class ="mb-3">မိတ်ဆွေ၏ဝယ်ယူမှုအောင်မြင်ပါသည်</h4>

    <p class="fw-bold">ဝယ်ယူသူအမည်: {{ $customer->name }}</p>
    
    
        @php $total = 0; @endphp
        @foreach ($carts as $cart)
            <p>အမျိုးအမည်- {{ $cart->product_name }}</p>
            <p>ဈေးနှုန်း - {{ $cart->product_price* $cart->quantity }}ကျပ်</p><br/>
            @php $total += $cart->product_price * $cart->quantity; @endphp
        @endforeach
    
    <hr>
    <p>စုစုပေါင်း: {{ $total }}ကျပ်</p>
</div>

<form action="{{ url('payment') }}" method="POST">
    @csrf
    <input type="hidden" name="total" value="{{ $total }}">
    <div class="d-flex justify-content-center mt-3">
    <button type="submit" class="btn btn-success">အိုကေ</button>
    </div>
</form>

</x-card-wrapper>
</x-layout>