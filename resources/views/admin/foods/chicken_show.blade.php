@props(['chickenfoods'])
<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    {{-- quantity check --}}
    @if($lowStockProducts->isNotEmpty())
            <div class="alert alert-danger text-center">
                <b class="text-danger">Warning!</b><b>The following products are low in stock:</b></br>
                    @foreach($lowStockProducts as $chickenfood)
                        {{ $chickenfood->name }} - Only {{ $chickenfood->quantity }} left</br>
                    @endforeach
                    <b class="text-secondary">Please fill the stock quantity!</b>
            </div>
    @endif
    <h3 class="my-3 text-center text-primary">Chicken Food List</h3>
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
                @foreach ($chickenfoods as $chickenfood)
                <tr>
                    <td><a href="/chicken_foods/{{$chickenfood->id}}" target="_blank">{{$chickenfood->code}}</a></td>
                    <td>{{$chickenfood->name}}</td>
                    <td>{{$chickenfood->company->name}}</td>
                    <td>{{$chickenfood->price}}</td>
                    <td>{{$chickenfood->quantity}}</td>
                    <td><a href="/admin/foods/chicken_food/{{$chickenfood->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/foods/chicken_food/{{$chickenfood->id}}/delete" method="POST">
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