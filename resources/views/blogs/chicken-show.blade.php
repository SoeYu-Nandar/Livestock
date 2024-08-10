<x-layout>
    <!-- single blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="/storage/{{$blogchicken->thumbnail}}" class="card-img-top" alt="..." />
                <h3 class="my-3">{{$blogchicken->title}}</h3>
                <div class="tags mb-2">
                    အမျိုးအစား - 
                    <a href="/blogs/?type={{$blogchicken->type->slug}}"><span class="badge rounded-pill text-bg-warning">{{$blogchicken->type->name}}</span></a>
              </div>
                  <div class="tags mb-1">
                    အကြောင်းအရာ - 
                    <a href="/blogs/?category={{$blogchicken->category->slug}}"><span class="badge rounded-pill text-bg-primary">{{$blogchicken->category->name}}</span></a>
              </div>
                <div class="text-secondary">{{$blogchicken->created_at->diffForHumans()}}</div>

                <p class="lh-md mt-3">
                    {!!$blogchicken->body!!}
                </p>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blogchicken="$blogchicken" />
            @else
            <p class="text-center">အကြုံပြုမှတ်ချက်ပေးရန် မိမိအကောင့်သို့ <a href="/login">login</a> ဝင်ရောက်ပါ။</p>
            @endauth
        </div>
    </section>

    @if ($blogchicken->comments->count())
    <x-comments :comments="$blogchicken->comments()->latest()->paginate(3)" />
    @endif
   
    <x-blog_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>