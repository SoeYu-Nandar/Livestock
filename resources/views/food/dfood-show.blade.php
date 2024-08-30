@props(['duckfood'])
<x-layout>
  @if (session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
    <div class="container my-3">
        <div class="card" style="border:none;">
        <div class="row">
          <div class="col-md-4">
            <!-- Image Thumbnail -->
          <img src="/storage/{{$duckfood->image}}" class="img-fluid rounded" alt="Thumbnail"
          style="max-width: 300px; cursor: pointer;height:300px;" data-bs-toggle="modal" data-bs-target="#imageModal">

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
              {{-- <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close" style="border:none;"></button> --}}
              <div class="modal-body p-0">
                <img src="/storage/{{$duckfood->image}}" class="w-100" alt="Full Image">
              </div>
            </div>
          </div>
        </div>
            {{-- <img src="/storage/{{$duckfood->image}}" alt="" class="img-fluid rounded" style="height:300px;"> --}}
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title fw-bold">{{$duckfood->name}}</div>
                <p class="card-text">ကုဒ်နံပါတ် - {{$duckfood->code}}</p>
                <p class="card-text">ကျွေးရမည့်ကာလ - {{$duckfood->feeding_program}}</p>
                <p class="card-text">ဈေးနှုန်း - {{$duckfood->price}} ကျပ်</p>
                <p class="card-text">အလေးချိန် - {{$duckfood->weight}} ကီလို</p>
                <p class="card-text">ကုမ္ပဏီအမည် - {{$duckfood->company->name}} Co.Ltd</p>
                <form action="{{ url('add_cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_type" value="duckfood">
                  <input type="hidden" name="product_name" value="{{ $duckfood->name }}">
                  <input type="hidden" name="product_id" value="{{ $duckfood->id }}">
                  <input type="hidden" name="product_price" value="{{ $duckfood->price }}">
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