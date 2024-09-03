<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Payment History</h3>
    
    <div class="container">
        <div class="card shadow-sm m-5 mt-3 p-4">
            <div class="text-center">
                @php $total = 0; @endphp
                <p><b>Customer Name:</b> {{$payment->user->name}}</p>
                <p><b>Purchase List:</b><br>
                    @if($payment->purchases->isNotEmpty())

                    @foreach ($payment->purchases as $purchase)
                    
                        {{ $purchase->product_name }}<br>
                        @php $total += $purchase->product_price * $purchase->quantity; @endphp
                        
                    @endforeach
                    @else
                    No items found.
                    @endif
                </p>
                <p><b>Total: </b>{{ $total }} ကျပ်</p>
                <p><b>Phone No:</b> {{$payment->phoneno}}</p>
                <p><b>Address:</b> {{$payment->address}}</p>
               
                <p><b>Payment Method:</b> {{$payment->payment}}</p>
               
                 <!-- Image Thumbnail -->
                 <img src="/storage/{{$payment->screenshot}}" class="img-fluid rounded" alt="Thumbnail"
                 style="max-width: 300px; cursor: pointer;height:300px;" data-bs-toggle="modal"
                 data-bs-target="#imageModal">

             <!-- Modal -->
             <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered modal-lg">
                     <div class="modal-content">
                         
                         <div class="modal-body p-0">
                             <img src="/storage/{{$payment->screenshot}}" class="w-100" alt="Full Image">
                         </div>
                     </div>
                 </div>
             </div>
                <a href="/admin/payments/show" class="btn btn-primary mt-3"
                    style="position:absolute;right:10px;bottom:10px;"><i class="bi bi-arrow-left"></i></a>
            </div>

        </div>
    </div>


</x-admin-layout>