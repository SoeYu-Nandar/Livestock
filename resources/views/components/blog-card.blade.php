@props(['blogchicken'])
<div class="card" style="width:18rem;" id="blog-card">
  <img src="/img/fish.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$blogchicken->title}}</h5>
    <p class="card-text">{{$blogchicken->intro}}</p>
    <div class="tags mb-2">
      အမျိုးအစား - 
      <a href="/blogs/?type={{$blogchicken->type->slug}}"><span class="badge rounded-pill text-bg-warning">{{$blogchicken->type->name}}</span></a>
</div>
    <div class="tags">
      အကြောင်းအရာ - 
      <a href="/blogs/?category={{$blogchicken->category->slug}}"><span class="badge text-bg-primary">{{$blogchicken->category->name}}</span></a>
</div>
      <p class="card-text"><small class="text-body-secondary">{{$blogchicken->created_at->diffForHumans()}}</small></p>
    </div>
    <a href="/blogs/{{$blogchicken->slug}}" class="btn btn-secondary">Read More</a>
  </div>