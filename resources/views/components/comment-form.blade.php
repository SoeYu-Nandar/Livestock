@props(['blogchicken'])
<x-card-wrapper>
    <form
        action="/blogs/{{$blogchicken->slug}}/comments"
        method="POST"
    >
        @csrf
        <div class="mb-3">
            <textarea
                required
                name="body"
                cols="10"
                class="form-control border border-0"
                rows="5"
                placeholder="say something..."
            ></textarea>
            
        </div>
        <div class="d-flex justify-content-end">
            <button
                type="submit"
                class="btn btn-primary"
            >မှတ်ချက်ပြုမည်</button>
        </div>
    </form>
</x-card-wrapper>
