<x-layout>
  @if(session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
   <div class="containter">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-6">
        <form action="" class="">
          <div class="input-group my-4 ms-4">             
              <input type="text" name="search" value="{{request('search')}}" class="form-control" autocomplete="false" placeholder="search by medicine name..." aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search-heart"></i></button>
          </div>      
        </form>
      </div>          
   </div>
    <x-card-wrapper>
    <table class="table">
        <thead class="table-danger">
          <tr>
            <th scope="col">ဆေးအမည်</th>
            <th scope="col">သက်ဆိုင်ရာဆေးပုံများ</th>
            <th scope="col">ဖြန့်ချီသောကုမ္ပဏီအမည်</th>
            <th scope="col">သုံးစွဲနိုင်သောတိရစ္ဆာန်များ</th>
            <th scope="col">အသုံးပြုနည်းများ</th>
            <th scope="col">အသုံးပြုနိုင်သောရောဂါများ</th>
            <th scope="col">ဈေးနှုန်းများ</th>
            <th scope="col">လုပ်ဆောင်မှုများ</th>

          </tr>
        </thead>
        <tbody>
          @foreach($medicines as $medicine)
          <tr>
            <td>{{$medicine->medicine_name}}</td>
            <td><img src="/storage/{{$medicine->image}}" class="card-img-top" alt="..." style="width:100px;height:100px;"></td>
            <td>{{$medicine->company_name}}</td>
            <td>{{$medicine->animals}}</td>
            <td>{{$medicine->methods}}</td>
            <td>{{$medicine->diseases}}</td>
            <td>{{$medicine->price}}</td>
            <td>
              <form action="{{ url('add_cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_type" value="medicine">
                  <input type="hidden" name="product_name" value="{{ $medicine->name }}">
                  <input type="hidden" name="product_id" value="{{ $medicine->id }}">
                  <input type="hidden" name="product_price" value="{{ $medicine->price }}">
                <div class="row">
                  <div class="col-12 col-md-6 mb-2 mb-md-0">
                    <input type="number" class="form-control" name="quantity" value="1" min="1" max="5">
                  </div>
                  <div class="col-12 col-md-6">
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