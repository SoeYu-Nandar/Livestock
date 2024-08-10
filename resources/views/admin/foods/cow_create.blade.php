<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Cow-Food Add Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/foods/cow_food/store" method="POST">
            @csrf
            <x-form.input name="code" />
            <x-form.input name="name" />
            <x-form.label name="company" />
                <select name="company_id" id="company" class="form-control">
                    @foreach ($companies as $company)
                    <option {{$company->id==old('company_id') ? 'selected':''}}
                        value="{{$company->id}}">{{$company->name}}
                    </option>
                    @endforeach
                </select>
            <x-form.input name="price" />
            <x-form.input name="quantity" />
            <x-form.input name="image" type="file"/>
            <x-form.textarea name="feeding program" />
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>
