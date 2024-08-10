@props(['faqs'])
<div id="faq">
    <h3 class="text-center my-4 fw-bold">ကျွန်ုပ်တို့နှင့်ဆက်သွယ်မေးမြန်းရန်</h3>
    <x-card-wrapper>
    <form action="/faq/store" method="POST">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">အမည်</label>
        <input type="text" class="form-control" id="name" name="name">
        @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
      </div>
      <div class="mb-3">
        <label for="question" class="form-label">မေးခွန်းမေးရန်</label>
        <textarea class="form-control" id="question" rows="3" name="question"></textarea>
        @error('question')
            <p class="text-danger">{{$message}}</p>
            @enderror
      </div>
      <input type="hidden" class="form-control" name="answer">
      @auth
      <div class="mb-3">
        <button type="submit" class="btn btn-info text-light">Submit</button>
      </div>
      @else
      <div class="mb-3">
        <button type="submit" class="btn btn-info"><a href="/login" style="text-decoration:none;color:white;">Submit</a></button>
      </div>  
      @endauth
    </form>
    {{-- accordian section --}}
    <h5 class="my-3">**အမေးများသောမေးခွန်းများ**</h5>
    <div class="accordion" id="accordionExample">
      @foreach($faqs as $index => $faq)
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $index }}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
            {{ $faq->question }}
          </button>
        </h2>
        <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>{{ $faq->answer }}</p>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  </x-card-wrapper>
</div>