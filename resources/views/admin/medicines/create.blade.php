<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Animal Medicine Add Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/medicines/store" method="POST">
            @csrf
            <x-form.input name="medicine name"/>
            <x-form.input name="image" type="file"/>
            <x-form.input name="company name" />
            <x-form.input name="animals" />
            <x-form.input name="methods" />
            <x-form.input name="diseases" />
            <x-form.input name="price" />
            <x-form.input name="quantity" />
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>