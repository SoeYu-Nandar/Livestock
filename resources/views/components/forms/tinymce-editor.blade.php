{{-- <form method="post">
  <label for="myeditorinstance">Body</label>
    <textarea id="myeditorinstance">{!!old($name,$value)!!}</textarea>
  </form> --}}
  @props(['name','value'=>''])
  {{-- <form action="post"> --}}
   
    <x-form.input-wrapper>
        <x-form.label :name="$name" />
        <textarea name="{{$name}}" id="{{$name}}" cols="30" rows="10" class="form-control">{!!old($name,$value)!!}</textarea>
        <x-error name="{{$name}}" />
    </x-form.input-wrapper>
  {{-- </form> --}}