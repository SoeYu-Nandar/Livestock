<x-layout>
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<x-hero/>
</x-layout>