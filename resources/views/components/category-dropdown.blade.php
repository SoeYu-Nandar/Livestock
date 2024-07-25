        <div class="dropdown mb-3" style="margin-left:600px;">  
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{isset($currentCategory) ? $currentCategory->name : 'Filter By Category'}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/">all</a></li>
          @foreach ($categories as $category)
          <li><a
                class="dropdown-item"
                href="/blogs/?category={{$category->slug}}{{request('type')?'&type='.request('type') : ''}}"
                >{{$category->name}}</a></li>
          @endforeach
            </ul>
          </div>
