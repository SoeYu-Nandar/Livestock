@props(['duckfoods'])
<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    {{-- quantity check --}}
    @if($lowStockProducts->isNotEmpty())
            <div class="alert alert-danger text-center">
                <b class="text-danger">Warning!</b><b>The following products are low in stock:</b></br>
                    @foreach($lowStockProducts as $duckfood)
                        {{ $duckfood->name }} - Only {{ $duckfood->quantity }} left</br>
                    @endforeach
                    <b class="text-secondary">Please fill the stock quantity!</b>
            </div>
    @endif
    <h3 class="my-3 text-center text-primary">Duck Food List</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" colspan="3">Action</th>
                 
                </tr>
            </thead>
            
            <tbody>
                @foreach ($duckfoods as $duckfood)
                <tr>
                    <td><a href="/duck_foods/{{$duckfood->id}}" target="_blank">{{$duckfood->code}}</a></td>
                    <td>{{$duckfood->name}}</td>
                    <td>{{$duckfood->company->name}}</td>
                    <td>{{$duckfood->price}}</td>
                    <td>{{$duckfood->quantity}}</td>
                    <td><a href="/admin/foods/duck_food/{{$duckfood->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/foods/duck_food/{{$duckfood->id}}/delete" method="POST">
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
                @endforeach
            </tbody>
        </table>
        {{-- {{$blogchicken->links()}} --}}
    </x-card-wrapper>
</x-admin-layout>