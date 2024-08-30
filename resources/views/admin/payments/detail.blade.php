<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Payment History</h3>
    <div class="container">
        <div class="card shadow-sm m-5 mt-3 p-4">
            <div class="text-center">
                <p><b>Customer Name:</b> {{$payment->user->name}}</p>
                <p><b>Phone No:</b> {{$payment->phoneno}}</p>
                <p><b>Address:</b> {{$payment->address}}</p>
                <p><b>Payment Method:</b> {{$payment->payment}}</p>
                <img src="/storage/{{$payment->screenshot}}" alt="" width="300px" height="500px"><br>
                <a href="/admin/payments/show" class="btn btn-primary mt-3" style="position:absolute;right:10px;bottom:10px;"><i class="bi bi-arrow-left"></i></a>
            </div>
            
        </div>
    </div>
        
    
</x-admin-layout>