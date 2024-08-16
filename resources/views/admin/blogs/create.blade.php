<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Blog Create Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/blogs/store" method="POST">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="intro" />
            <x-head.tinymce-config/>
            {{-- <x-form.textarea name="body"/> --}}
            <x-forms.tinymce-editor name="body"/>
            <x-form.input name="thumbnail" type="file"/>
            
            <x-form.input-wrapper>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option {{$category->id==old('category_id') ? 'selected':''}}
                        value="{{$category->id}}">{{$category->name}}
                    </option>
                    @endforeach
                </select>
                <x-form.label name="type" />
                <select name="type_id" id="type" class="form-control">
                    @foreach ($types as $type)
                    <option {{$type->id==old('type_id') ? 'selected':''}}
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