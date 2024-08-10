<x-admin-layout>
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    @endif
    <h3 class="my-3 text-center text-primary">Blogs List</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Intro</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($blogchickens as $blogchicken)
                <tr>
                    <td><a href="/blogs/{{$blogchicken->slug}}" target="_blank">{{$blogchicken->title}}</a></td>
                    <td>{{$blogchicken->intro}}</td>
                    <td><a href="/admin/blogs/{{$blogchicken->slug}}/edit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        <span class="d-none d-lg-inline">
                            Edit
                            </span>
                    </a></td>
                    <td>
                        <form action="/admin/blogs/{{$blogchicken->slug}}/delete" method="POST">
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
        {{$blogchickens->links()}}
    </x-card-wrapper>
</x-admin-layout>
