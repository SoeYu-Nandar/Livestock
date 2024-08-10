@props(['blogchicken'])
<div class="card" id="blog-card">
  <img src="/storage/{{$blogchicken->thumbnail}}" class="card-img-top" alt="picture">
  <div class="card-body">
    <h5 class="card-title">{{$blogchicken->title}}</h5>
    <p class="card-text">{{$blogchicken->intro}}</p>
    <div class="tags">
      အမျိုးအစား - 
      <a href="/blogs/?type={{$blogchicken->type->slug}}"><span class="badge rounded-pill text-bg-warning">{{$blogchicken->type->name}}</span></a>
    </div>
    <div class="tags">
      အကြောင်းအရာ - 
      <a href="/blogs/?category={{$blogchicken->category->slug}}"><span class="badge text-bg-primary">{{$blogchicken->category->name}}</span></a>
    </div>
      <p class="card-text"><small class="text-body-secondary">{{$blogchicken->created_at->diffForHumans()}}</small></p>
      <a href="/blogs/{{$blogchicken->slug}}" class="btn btn-success rounded-pill">Read More</a>
    </div>
    
  </div>