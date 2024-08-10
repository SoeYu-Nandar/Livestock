<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Admin Reply Form</h3>
    <x-card-wrapper>
        <form action="/admin/faq/{{$faq->id}}/update" method="POST">
            @method('patch')
            @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$faq->name}}" disabled>
      </div>
      <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control" id="question" rows="3" name="question" disabled>{{ old('question', $faq->question) }}</textarea>
      </div>
      <div class="mb-3">
        <label for="answer" class="form-label">Answer</label>
        <textarea class="form-control" id="answer" rows="3" name="answer"></textarea>
      </div>
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </form>
    </x-card-wrapper>
</x-admin-layout>