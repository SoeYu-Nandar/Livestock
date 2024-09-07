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
            <th scope="col">ပမာဏ</th>
            <th scope="col">ဈေးနှုန်းများ</th>
            <th scope="col">လုပ်ဆောင်မှုများ</th>

          </tr>
        </thead>
        <tbody>
          @foreach($medicines as $medicine)
        
          <tr>
            <td>{{$medicine->name}}</td>
            <td>
              <!-- Image Thumbnail -->
              <img src="/storage/{{$medicine->image}}" 
                   class="img-fluid rounded thumbnail" 
                   alt="Thumbnail" 
                   style="max-width: 100px; cursor: pointer; height: 100px;" 
                   data-bs-toggle="modal" 
                   data-bs-target="#imageModal" 
                   data-bs-image="/storage/{{$medicine->image}}">
          </td>
          
          <!-- Common Modal -->
          <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                      
                      <div class="modal-body p-0">
                          <img id="modalImage" src="" class="w-100" alt="Full Image">
                      </div>
                  </div>
              </div>
          </div>
          
            {{-- <td><img src="/storage/{{$medicine->image}}" class="card-img-top" alt="..." style="width:100px;height:100px;"></td> --}}
            <td>{{$medicine->company_name}}</td>
            <td>{{$medicine->animals}}</td>
            <td>{{$medicine->methods}}</td>
            <td>{{$medicine->diseases}}</td>
            <td>{{$medicine->weight}}</td>
            <td>{{$medicine->price}} ကျပ်</td>
            <td>
              
              <form action="{{ url('add_cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_type" value="medicine">
                  <input type="hidden" name="product_name" value="{{$medicine->name}}">
                  <input type="hidden" name="product_id" value="{{ $medicine->id }}">
                  <input type="hidden" name="product_price" value="{{ $medicine->price }}">
                <div class="row">
                  <div class="col-12 col-md-10 mb-2 mb-md-2">
                    <input type="number" class="form-control" name="quantity" value="1" min="1" max="5">
                  </div>
                  <div class="col-12 col-md-10">
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
      {{$medicines->links()}}
      <script>
        // Select all thumbnail images
        document.querySelectorAll('.thumbnail').forEach(item => {
            item.addEventListener('click', function() {
                // Get the image source from the clicked thumbnail
                const imageSrc = this.getAttribute('data-bs-image');
                // Update the modal image source
                document.getElementById('modalImage').setAttribute('src', imageSrc);
            });
        });
    </script>
    </x-card-wrapper>

</x-layout>