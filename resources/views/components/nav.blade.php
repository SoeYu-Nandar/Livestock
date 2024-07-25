<div style="background-color:#0E21A0;">
  <ul class="nav justify-content-end">
    <li class="nav-item my-2">
      <a class="nav-link text-light" href="/">ပင်မစာမျက်နှာ</a>
    </li>
      <li class="nav-item my-2">
      <a class="nav-link text-light" href="/blogs">
        မွေးမြူရေးဗဟုသုတ
      </a>
    </li>
      
    <div class="dropdown">
      <a class="btn text-light dropdown-toggle border-0 my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        တိရစ္ဆာန်အစာများ
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">ကြက်စာများ</a></li>
        <li><a class="dropdown-item" href="#">ဝက်စာများ</a></li>
        <li><a class="dropdown-item" href="#">ဘဲစာများ</a></li>
        <li><a class="dropdown-item" href="#">နွားစာများ</a></li>
        <li><a class="dropdown-item" href="#">ငါးစာများ</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="btn text-light dropdown-toggle border-0 my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        ဆေးဝါးများ
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">အားဆေးများ</a></li>
        <li><a class="dropdown-item" href="#">ကုသဆေးများ</a></li>
        <li><a class="dropdown-item" href="#">အသားတိုးဆေးများ</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="btn text-light dropdown-toggle border-0 my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        သားပေါက်များ
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">ကြက်သားပေါက်များ</a></li>
        <li><a class="dropdown-item" href="#">ဝက်သားပေါက်များ</a></li>
        <li><a class="dropdown-item" href="#">ငါးသားပေါက်များ</a></li>
      </ul>
    </div>
    <li class="nav-item my-2">
      <a class="nav-link text-light" href="#">FAQ</a>
    </li>

    @auth
    <img src="{{auth()->user()->avatar}}" width="30" height="30" class="rounded-circle mt-3">
    <li class="nav-item mt-3 ms-1 text-light">
      {{auth()->user()->name}}
    </li>
    <form action="/logout" method="POST">@csrf
      <li class="nav-item">
        <button type="submit" class="btn nav-link m-2 text-light" style="border:1px solid red;">ထွက်ရန်</button>
      </li>
    </form>
    @else
    <li class="nav-item">
      <a class="btn btn-primary m-2 text-light" href="/register">စာရင်းသွင်းရန်</a>
    </li>
    <li class="nav-item">
      <a class="btn btn-info m-2 text-light" href="/login">ဝင်ရန်</a>
    </li>
    @endauth

  </ul>
</div>