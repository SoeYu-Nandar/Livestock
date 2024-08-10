@props(['pigfoods'])
<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    <h3 class="my-3 text-center text-primary">Pig Food List</h3>
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
                @foreach ($pigfoods as $pigfood)
                <tr>
                    <td><a href="/pig_foods/{{$pigfood->id}}" target="_blank">{{$pigfood->code}}</a></td>
                    <td>{{$pigfood->name}}</td>
                    <td>{{$pigfood->company->name}}</td>
                    <td>{{$pigfood->price}}</td>
                    <td>{{$pigfood->quantity}}</td>
                    <td><a href="/admin/foods/pig_food/{{$pigfood->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/foods/pig_food/{{$pigfood->id}}/delete" method="POST">
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