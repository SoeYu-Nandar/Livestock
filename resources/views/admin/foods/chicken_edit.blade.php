<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Chicken-Food Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/foods/chicken_food/{{$chickenfood->id}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="code"  value="{{$chickenfood->code}}"/>
            <x-form.input name="name" value="{{$chickenfood->name}}"/>
                <x-form.label name="company" />
                <select name="company_id" id="company" class="form-control">
                    @foreach ($companies as $company)
                    <option {{$company->id==old('company_id',$chickenfood->company->id) ? 'selected':''}}
                        value="{{$company->id}}">{{$company->name}}
                    </option>
                    @endforeach
                </select>
            <x-form.input name="price" value="{{$chickenfood->price}}"/>
            <x-form.input name="quantity" value="{{$chickenfood->quantity}}"/>
            <x-form.input name="thumbnail" type="file"/>
            <img src="/storage/{{$chickenfood->image}}" width="200px" height="100px" alt="">
            <x-form.textarea name="feeding program" value="{{$chickenfood->feeding_program}}"/>
                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>