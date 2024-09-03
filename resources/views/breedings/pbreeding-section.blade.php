<x-layout>
  <marquee behavior="" direction="" class="my-2" style="color:red;"><img src="/img/pigicon.gif" style="width:40px;height:40px;">ဝက်သားပေါက်ဈေးနှုန်းများသည်အချိန်နှင့်အမျှပြောင်းလဲမှုရှိနိုင်ပါသည်။</marquee> 
  @if(session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
  @if(session('error'))
  <div class="alert alert-danger text-center">{{session('error')}}</div>
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
            @foreach($pbreedings as $pbreeding)
            <tr>
              <td scope="row">{{$pbreeding->description}}</td>
              
              <td>
                <!-- Image Thumbnail -->
                <img src="/storage/{{$pbreeding->image}}" class="img-fluid rounded thumbnail" alt="Thumbnail"
                  style="max-width: 100px; cursor: pointer; height: 100px;" data-bs-toggle="modal"
                  data-bs-target="#imageModal" data-bs-image="/storage/{{$pbreeding->image}}">
                </td>
      
                <!-- Common Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <img id="modalImage" src="" class="w-100" alt="Full Image">
                      </div>
                    </div>
                  </div>
                </div>
              <td>{{$pbreeding->price}} ကျပ်</td>
              <td>
                <form action="{{ url('add_cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_type" value="pbreeding">
                  <input type="hidden" name="product_name" value="{{ $pbreeding->name }}">
                  <input type="hidden" name="product_id" value="{{ $pbreeding->id }}">
                  <input type="hidden" name="product_price" value="{{ $pbreeding->price }}">
                  <div class="row">
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                      <input type="number" class="form-control" name="quantity" value="500" min="500" max="1000">
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
    {{$pbreedings->links()}}
    </x-card-wrapper>
</x-layout>