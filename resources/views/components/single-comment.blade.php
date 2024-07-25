@props(['comment'])
<x-card-wrapper>
    <div class="d-flex">
        <div>
            <img src="{{$comment->user->avatar}}" width="40" height="40" class="rounded-circle" alt="">
        </div>
        <div class="ms-1">
            <h6>{{$comment->user->name}}</h6>
            <p class="text-secondary">{{$comment->created_at->format("F j, Y, g:i a")}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card-wrapper>