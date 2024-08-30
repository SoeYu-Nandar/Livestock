@props(['chickenfood'])
<x-layout>
  @if (session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
  <div class="container my-3">
    <div class="card" style="border:none;">
      <div class="row">
        <div class="col-md-4">
          <!-- Image Thumbnail -->
          <img src="/storage/{{$chickenfood->image}}" class="img-fluid rounded" alt="Thumbnail"
            style="max-width: 300px; cursor: pointer;height:300px;" data-bs-toggle="modal" data-bs-target="#imageModal">

          <!-- Modal -->
          <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                {{-- <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close" style="border:none;"></button> --}}
                <div class="modal-body p-0">
                  <img src="/storage/{{$chickenfood->image}}" class="w-100" alt="Full Image">
                </div>
              </div>
            </div>
          </div>
          {{-- <img src="/storage/{{$chickenfood->image}}" alt="" class="img-fluid rounded"> --}}
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="card-title fw-bold">{{$chickenfood->name}}</div>
            <p class="card-text">ကုဒ်နံပါတ် - {{$chickenfood->code}}</p>
            <p class="card-text">ကျွေးရမည့်ကာလ - {{$chickenfood->feeding_program}}</p>
            <p class="card-text">ဈေးနှုန်း - {{$chickenfood->price}} ကျပ်</p>
            <p class="card-text">အလေးချိန် - {{$chickenfood->weight}} ကီလို</p>
            <p class="card-text">ကုမ္ပဏီအမည် - {{$chickenfood->company->name}} Co.Ltd</p>
            <form action="{{ url('add_cart') }}" method="POST">
              @csrf
              <input type="hidden" name="product_type" value="chickenfood">
              <input type="hidden" name="product_name" value="{{ $chickenfood->name }}">
              <input type="hidden" name="product_id" value="{{ $chickenfood->id }}">
              <input type="hidden" name="product_price" value="{{ $chickenfood->price }}">
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