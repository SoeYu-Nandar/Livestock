<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    <h3 class="my-3 text-center text-primary">Chicken Breeding List</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col" colspan="3">Action</th>
                 
                </tr>
            </thead>
            
            <tbody>
               @foreach($chickenbreedings as $chickenbreeding)
                <tr>
                    <td><a href="" target="_blank">{{$chickenbreeding->description}}</a></td>
                    <td>{{$chickenbreeding->quantity}}</td>
                    <td>{{$chickenbreeding->price}}</td>                    
                    <td><a href="/admin/breedings/chicken_breeding/{{$chickenbreeding->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/breedings/chicken_breeding/{{$chickenbreeding->id}}/delete" method="POST">
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
        </table>
        {{$chickenbreedings->links()}}
    </x-card-wrapper>
</x-admin-layout>