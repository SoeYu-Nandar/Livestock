<x-layout>
    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <x-card-wrapper>
        
        <!-- Image Thumbnail -->
        <img src="/img/kbzpay.jpg" class="img-fluid rounded" alt="Thumbnail"
            style="position:absolute;top:25px;left:30px;width: 250px; cursor: pointer;height:250px;" data-bs-toggle="modal" data-bs-target="#imageModal">

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        <img src="/img/kbzpay.jpg" class="w-100" alt="Full Image">
                    </div>
                </div>
            </div>
        </div>
       <!-- Image Thumbnail -->
       <img src="/img/wavepay.jpg" class="img-fluid rounded" alt="Thumbnail"
       style="position:absolute;top:25px;right:30px;width: 250px; cursor: pointer;height:250px;" data-bs-toggle="modal" data-bs-target="#imageModal1">

   <!-- Modal -->
   <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-sm">
           <div class="modal-content">

               <div class="modal-body p-0">
                   <img src="/img/wavepay.jpg" class="w-100" alt="Full Image">
               </div>
           </div>
       </div>
   </div>
       
        <form action="/done" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    @php $total = 0; @endphp
                    @foreach ($carts as $cart)
                    @php $total += $cart->product_price * $cart->quantity; @endphp
                    @endforeach
                    <div class="col-md-5 mx-auto">
                        <p class="fw-bold">ဝယ်ယူသူအမည်: {{ $user->name }}</p>
                        <p class="fw-bold">စုစုပေါင်း : {{ $total }} ကျပ်</p>
                        <input type="hidden" name="total" value="{{ $total }}">
                        <div class="mb-3">
                            <label for="username" class="form-label">ဖုန်းနံပါတ်</label>
                            <input type="text" class="form-control" id="username" name="phoneno" required>
                            @error('phoneno')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">လိပ်စာ</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pay" class="form-label">ငွေပေးချေမှု</label>
                            <select class="form-select" aria-label="Default select example" id="pay" name="payment">
                                <option value="">အားလုံး</option>
                                <option value="KBZ-Pay">KBZ-Pay</option>
                                <option value="Wave-Pay">Wave-Pay</option>
                            </select>
                            @error('payment')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">ပြေစာထည့်သွင်းပါ</label>
                            <input class="form-control" type="file" id="formFile" name="screenshot">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-info">အိုကေ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </x-card-wrapper>
</x-layout>