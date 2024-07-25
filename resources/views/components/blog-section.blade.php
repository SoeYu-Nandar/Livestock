@props(['blogchickens'])
<x-category-dropdown/>
<section class="container" id="blogs">
        <form action="" class="" >
        <div class="input-group">
            @if(request('category'))
            <input
                name="category"
                type="hidden"
                value="{{request('category')}}"/>
            @endif
            @if(request('type'))
            <input
                name="type"
                type="hidden"
                value="{{request('type')}}"
            />
            @endif
        </div>
        </form>
        <div class="row text-center">

                @forelse ($blogchickens as $blogchicken)
                <div class="col-md-4 mb-4">
                        <x-blog-card :blogchicken="$blogchicken" />
                </div>
                @empty
                <p class="text-center">No Blogs Found.</p>
                @endforelse


        </div>
</section>