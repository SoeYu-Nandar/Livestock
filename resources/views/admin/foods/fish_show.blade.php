@props(['fishfoods'])
<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    {{-- quantity check --}}
    @if($lowStockProducts->isNotEmpty())
            <div class="alert alert-danger text-center">
                <b class="text-danger">Warning!</b><b>The following products are low in stock:</b></br>
                    @foreach($lowStockProducts as $fishfood)
                        {{ $fishfood->name }} - Only {{ $fishfood->quantity }} left</br>
                    @endforeach
                    <b class="text-secondary">Please fill the stock quantity!</b>
            </div>
    @endif
    <h3 class="my-3 text-center text-primary">Fish Food List</h3>
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
                @foreach ($fishfoods as $fishfood)
                <tr>
                    <td><a href="/fish_foods/{{$fishfood->id}}" target="_blank">{{$fishfood->code}}</a></td>
                    <td>{{$fishfood->name}}</td>
                    <td>{{$fishfood->company->name}}</td>
                    <td>{{$fishfood->price}}</td>
                    <td>{{$fishfood->quantity}}</td>
                    <td><a href="/admin/foods/fish_food/{{$fishfood->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/foods/fish_food/{{$fishfood->id}}/delete" method="POST">
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
        {{$fishfoods->links()}}
    </x-card-wrapper>
</x-admin-layout>