<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Pig-Food Edit Form</h3>
    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/foods/pig_food/{{$pigfood->id}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="code"  value="{{$pigfood->code}}"/>
            <x-form.input name="name" value="{{$pigfood->name}}"/>
                <x-form.label name="company" />
                <select name="company_id" id="company" class="form-control">
                    @foreach ($companies as $company)
                    <option {{$company->id==old('company_id',$pigfood->company->id) ? 'selected':''}}
                        value="{{$company->id}}">{{$company->name}}
                    </option>
                    @endforeach
                </select>
            <x-form.input name="price" value="{{$pigfood->price}}"/>
            <x-form.input name="quantity" value="{{$pigfood->quantity}}"/>
            <x-form.input name="weight" value="{{$pigfood->weight}}"/>
            <x-form.input name="thumbnail" type="file"/>
            <img src="/storage/{{$pigfood->image}}" width="200px" height="100px" alt="">
            <x-form.textarea name="feeding program" value="{{$pigfood->feeding_program}}"/>
                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>