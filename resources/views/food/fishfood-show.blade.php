@props(['fishfood'])
<x-layout>
  @if (session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
    <div class="container my-3">
        <div class="card" style="border:none;">
        <div class="row">
          <div class="col-md-4">
            <img src="/storage/{{$fishfood->image}}" alt="" class="img-fluid rounded" style="height:300px;width:300px;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title fw-bold">{{$fishfood->name}}</div>
              <p class="card-text">ကုဒ်နံပါတ် - {{$fishfood->code}}</p>
                <p class="card-text"> {{$fishfood->feeding_program}}</p>
                <p class="card-text">ဈေးနှုန်း - {{$fishfood->price}} ကျပ်</p>
                <p class="card-text">ကုမ္ပဏီအမည် - {{$fishfood->company->name}} Co.Ltd</p>
                <form action="{{ url('add_cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_type" value="fishfood">
                  <input type="hidden" name="product_name" value="{{ $fishfood->name }}">
                  <input type="hidden" name="product_id" value="{{ $fishfood->id }}">
                  <input type="hidden" name="product_price" value="{{ $fishfood->price }}">
                  <div class="row">
                    <div class="col-12 col-md-2 mb-2 mb-md-0">
                      <input type="number" class="form-control" name="quantity" value="1" min="1" max="5">
                    </div>
                    <div class="col-12 col-md-2">
                      <button class="btn btn-info w-100 rounded-pill" type="submit" id="button-addon2">
                        <i class="bi bi-cart4"></i>
                      </button>
                    </div>
                  </div>
                </form>      
            </div>
          </div>
        </div>
        </div>
      </div>
</x-layout>