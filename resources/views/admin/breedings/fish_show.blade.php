<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    {{-- quantity check --}}
    @if($lowStockProducts->isNotEmpty())
            <div class="alert alert-danger text-center">
                <b class="text-danger">Warning!</b><b>The following products are low in stock:</b></br>
                    @foreach($lowStockProducts as $fishbreeding)
                        {{ $fishbreeding->description }} - Only {{ $fishbreeding->quantity }} left</br>
                    @endforeach
                    <b class="text-secondary">Please fill the stock quantity!</b>
            </div>
    @endif
    <h3 class="my-3 text-center text-primary">Fish Breeding List</h3>
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
                @foreach($fishbreedings as $fishbreeding)
                <tr>
                    <td><a href="" target="_blank">{{$fishbreeding->description}}</a></td>
                    <td>{{$fishbreeding->quantity}}</td>
                    <td>{{$fishbreeding->price}}</td>
                    <td><a href="/admin/breedings/fish_breeding/{{$fishbreeding->id}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/breedings/fish_breeding/{{$fishbreeding->id}}/delete" method="POST">
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
        {{$fishbreedings->links()}}
    </x-card-wrapper>
</x-admin-layout>