<x-layout>
  @if(session('warning'))
  <div class="alert alert-warning text-center">{{session('warning')}}</div>
  @endif
    <h4 class="text-center my-2 text-success fw-bold">ဈေးဝယ်ယူသည့်စာရင်း</h4>
    <x-card-wrapper>
        <table class="table">
            <thead class="table-success">
              <tr>
                <th scope="col">အမျိုးအမည်များ</th>
                <th scope="col">ဈေးနှုန်း</th>
                <th scope="col">အရေအတွက်</th>
                <th scope="col" class="text-center">မှတ်ချက်</th>    
              </tr>
            </thead>
            <tbody>
              @foreach($carts as $cart)
              <tr>
                <td>{{$cart->product_name}}</td>
                <td>{{$cart->product_price}}</td>
                <td>{{$cart->quantity}}</td>
                                
                <td>
                  <form action="/remove_cart/{{$cart->id}}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row d-flex justify-content-center">
                      <div class="col-12 col-md-6">
                        <button class="btn btn-danger w-100 rounded-pill" type="submit">
                            <i class="bi bi-trash3-fill">ပယ်ဖျက်မည်</i>
                        </button>
                      </div>
                    </div>
                  </form>      
                </td>
              </tr>
           @endforeach   
            </tbody>
          </table>
    </x-card-wrapper>
</x-layout>