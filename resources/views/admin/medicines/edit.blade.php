<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Animal Medicine Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/medicines/{{$medicine->id}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="name"  value="{{$medicine->name}}"/>
            <x-form.input name="image" type="file"/>
            <img src="/storage/{{$medicine->image}}" width="200px" height="100px" alt="">
            <x-form.input name="company name"  value="{{$medicine->company_name}}"/>
            <x-form.input name="animals"  value="{{$medicine->animals}}"/>
            <x-form.input name="methods"  value="{{$medicine->methods}}"/>
            <x-form.input name="diseases"  value="{{$medicine->diseases}}"/>
            <x-form.input name="weight"  value="{{$medicine->weight}}"/>
            <x-form.input name="price"  value="{{$medicine->price}}"/>
            <x-form.input name="quantity"  value="{{$medicine->quantity}}"/>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>