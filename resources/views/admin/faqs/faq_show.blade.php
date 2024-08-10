<x-admin-layout>
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <h3 class="my-3 text-center text-primary">Reply FAQ Section</h3>
    <x-card-wrapper>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                 
                </tr>
            </thead>
            
            <tbody>
               @foreach($faqs as $faq)
                <tr>
                    <td>{{$faq->name}}</td>
                    <td><a href="/faq" target="_blank">{{$faq->question}}</a></td>
                    <td><a href="/admin/faq/{{$faq->id}}/reply" class="btn btn-danger">
                        <i class="bi bi-reply"></i>
                        <span class="d-none d-lg-inline">
                            Reply
                            </span>
                    </a></td>
                </tr>
                @endforeach
            </tbody> 
        </table>
        {{$faqs->links()}}
    </x-card-wrapper>
</x-admin-layout>
