<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    {{-- quantity check --}}
    @if($lowStockProducts->isNotEmpty())
    <div class="alert alert-danger text-center">
        <b class="text-danger">Warning!</b><b>The following products are low in stock:</b></br>
        @foreach($lowStockProducts as $medicine)
        {{ $medicine->medicine_name }} - Only {{ $medicine->quantity }} left</br>
        @endforeach
        <b class="text-secondary">Please fill the stock quantity!</b>
    </div>
    @endif
    <h3 class="my-3 text-center text-primary">Medicine List</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Accessible Animals</th>
                    <th scope="col">Accessible method</th>
                    <th scope="col">Diseases</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" colspan="2">Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach($medicines as $medicine)
                <tr>
                    <td><a href="/medicines" target="_blank">{{$medicine->medicine_name}}</a></td>
                    <td>{{$medicine->company_name}}</td>
                    <td>{{$medicine->animals}}</td>
                    <td>{{$medicine->methods}}</td>
                    <td>{{$medicine->diseases}}</td>
                    <td>{{$medicine->price}}</td>
                    <td>{{$medicine->quantity}}</td>

                    <td><a href="/admin/medicines/{{$medicine->id}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            <span class="d-none d-lg-inline">
                                Edit
                            </span>
                        </a></td>
                    <td>
                        <form action="/admin/medicines/{{$medicine->id}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                                <span class="d-none d-lg-inline">
                                    Delete
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{$medicines->links()}}
    </x-card-wrapper>
</x-admin-layout>