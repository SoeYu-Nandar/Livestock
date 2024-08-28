<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Payment List</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">User_Id</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Payment method</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{$payment->user_id}}</td>
                    <td>{{$payment->phoneno}}</td>
                    <td>{{$payment->address}}</td>
                    <td>{{$payment->payment}}</td>
                    <td><img src="/storage/{{$payment->screenshot}}" alt="" width="100px" height="100px"></td>
                    <td><a href="/payments/{{$payment->id}}" class="btn btn-info">View Details</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$payments->links()}}
    </x-card-wrapper>
</x-admin-layout>