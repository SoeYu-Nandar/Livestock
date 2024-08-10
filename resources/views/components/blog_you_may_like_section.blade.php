<section class="blogs_you_may_like">
    <div class="container">
        <h3 class="text-center my-4 fw-bold">ဆက်စပ်အကြောင်းအရာများ</h3>
        <div class="row text-center">
            @foreach ($randomBlogs as $blogchicken)
            <div class="col-md-3 my-5">
                <x-blog-card :blogchicken="$blogchicken" />
            </div>
            @endforeach
        </div>
    </div>
</section>