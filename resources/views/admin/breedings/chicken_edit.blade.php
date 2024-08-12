<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Chicken-Breeding Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/breedings/chicken_breeding/{{$chickenbreeding->id}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="name" value="{{$chickenbreeding->name}}"/>
            <x-form.input name="description"  value="{{$chickenbreeding->description}}"/>
            <x-form.input name="image" type="file"/>
            <img src="/storage/{{$chickenbreeding->image}}" width="200px" height="100px" alt="">
            <x-form.input name="price"  value="{{$chickenbreeding->price}}"/>
            <x-form.input name="quantity"  value="{{$chickenbreeding->quantity}}"/>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>