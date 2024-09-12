<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Fish-Breeding Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/breedings/fish_breeding/{{$fishbreeding->id}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="name" value="{{$fishbreeding->name}}"/>
            <x-form.input name="description"  value="{{$fishbreeding->description}}"/>
            <x-form.textarea name="remark" value="{{$fishbreeding->remark}}"/>
            <x-form.input name="image" type="file"/>
            <img src="/storage/{{$fishbreeding->image}}" width="200px" height="100px" alt="">
            <x-form.input name="price"  value="{{$fishbreeding->price}}"/>
            <x-form.input name="quantity"  value="{{$fishbreeding->quantity}}"/>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>