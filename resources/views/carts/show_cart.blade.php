<x-layout>
    <h3 class="text-center my-2 text-success">Order Table</h3>
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
                  <form action="{{ url('add_cart') }}" method="POST">
                    @csrf
                    
                    <div class="row d-flex justify-content-center">
                      <div class="col-12 col-md-3 mb-2 mb-md-0">
                        <button class="btn btn-warning w-100 rounded-pill" type="submit">
                            <i class="bi bi-recycle"></i>
                          </button>
                      </div>
                      <div class="col-12 col-md-3">
                        <button class="btn btn-danger w-100 rounded-pill" type="submit">
                            <i class="bi bi-trash3-fill"></i>
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