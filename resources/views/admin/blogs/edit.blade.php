<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Blog Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/blogs/{{$blogchicken->slug}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="title"  value="{{$blogchicken->title}}"/>
            <x-form.input name="slug" value="{{$blogchicken->slug}}"/>
            <x-form.input name="intro" value="{{$blogchicken->intro}}"/>
            <x-form.textarea name="body" value="{{$blogchicken->body}}"/>
            <x-form.input name="thumbnail" type="file"/>
            <img src="/storage/{{$blogchicken->thumbnail}}" width="200px" height="100px" alt="">
            <x-form.input-wrapper>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option {{$category->id==old('category_id',$blogchicken->category->id) ? 'selected':''}}
                        value="{{$category->id}}">{{$category->name}}
                    </option>
                    @endforeach
                </select>
                <x-form.label name="type" />
                <select name="type_id" id="type" class="form-control">
                    @foreach ($types as $type)
                    <option {{$type->id==old('type_id',$blogchicken->type->id) ? 'selected':''}}
                        value="{{$type->id}}">{{$type->name}}
                    </option>
                    @endforeach
                </select>
                <x-error name="type_id" />
            </x-form.input-wrapper>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>