
        <div class="dropdown mb-2 mt-2 text-center">  
          <h5 class="py-2">မွေးမြူရေးဗဟုသုတများအားဖတ်ရှုရန်</h5>
            <button class="btn bg-info-subtle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{isset($currentCategory) ? $currentCategory->name : 'အမျိုးအစားများ'}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/blogs">အားလုံး</a></li>
          @foreach ($categories as $category)
          <li><a
                class="dropdown-item"
                href="/blogs/?category={{$category->slug}}{{request('type')?'&type='.request('type') : ''}}"
                >{{$category->name}}</a></li>
          @endforeach
            </ul>
          </div>
