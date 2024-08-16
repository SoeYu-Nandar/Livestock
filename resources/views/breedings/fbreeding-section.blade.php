<x-layout>
  <marquee behavior="" direction="" class="my-2" style="color:red;"><img src="/img/tunaicon.gif" style="width:40px;height:40px;">ငါးသားပေါက်ဈေးနှုန်းများသည်အချိန်နှင့်အမျှပြောင်းလဲမှုရှိနိုင်ပါသည်။</marquee> 
  @if(session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
  <x-card-wrapper>
    <table class="table">
        <thead class="table-warning">
          <tr>
            <th scope="col">သားပေါက်ဆိုင်ရာဖော်ပြချက်</th>
            <th scope="col">သားပေါက်ပုံများ</th>
            <th scope="col">ဈေးနှုန်းများ</th>
            <th scope="col">လုပ်ဆောင်မှုများ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fbreedings as $fbreeding)
          <tr>
            <th scope="row">{{$fbreeding->description}}</th>
            <td><img src="/storage/{{$fbreeding->image}}" class="card-img-top" alt="..." style="width:100px;height:100px;"></td>
            <td>{{$fbreeding->price}} ကျပ်</td>
            <td>
              <form action="{{ url('add_cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_type" value="fbreeding">
                  <input type="hidden" name="product_name" value="{{ $fbreeding->name }}">
                  <input type="hidden" name="product_id" value="{{ $fbreeding->id }}">
                  <input type="hidden" name="product_price" value="{{ $fbreeding->price }}">
                <div class="row">
                  <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <input type="number" class="form-control" name="quantity" value="500" min="500" max="5000">
                  </div>
                  <div class="col-12 col-md-4">
                    <button class="btn btn-info w-100 rounded-pill" type="submit" id="button-addon2">
                      <i class="bi bi-cart4"></i>
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