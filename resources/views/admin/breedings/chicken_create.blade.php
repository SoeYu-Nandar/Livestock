<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Chicken-Breeding Add Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/breedings/chicken_breeding/store" method="POST">
            @csrf
            <x-form.input name="name" />
            <x-form.input name="description" />
            <x-form.input name="image" type="file"/>
            <x-form.input name="price" />
            <x-form.input name="quantity" />           
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>
