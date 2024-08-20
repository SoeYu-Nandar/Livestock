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
      <a class="btn text-light dropdown-toggle border-0 my-2" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        တိရစ္ဆာန်အစာများ
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/chicken_foods">ကြက်စာများ</a></li>
        <li><a class="dropdown-item" href="/pig_foods">ဝက်စာများ</a></li>
        <li><a class="dropdown-item" href="/duck_foods">ဘဲစာများ</a></li>
        <li><a class="dropdown-item" href="/cow_foods">နွားစာများ</a></li>
        <li><a class="dropdown-item" href="/fish_foods">ငါးစာများ</a></li>
      </ul>
    </div>
    <li class="nav-item my-2">
      <a class="nav-link text-light" href="/medicines">
        ဆေးဝါးများ
      </a>
    </li>


    <div class="dropdown">
      <a class="btn text-light dropdown-toggle border-0 my-2" href="" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        သားပေါက်များ
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/chicken_breedings">ကြက်သားပေါက်များ</a></li>
        <li><a class="dropdown-item" href="/pig_breedings">ဝက်သားပေါက်များ</a></li>
        <li><a class="dropdown-item" href="/fish_breedings">ငါးသားပေါက်များ</a></li>
      </ul>
    </div>
    <li class="nav-item my-2">
      <a class="nav-link text-light" href="/faq">အမေးအဖြေကဏ္ဍ</a>
    </li>
    @auth
    <li class="nav-item my-2 mx-3">
      <a class="nav-link rounded-pill bg-info text-light" href="/show_cart">
        <i class="bi bi-cart-check-fill"></i>
        <span class="badge bg-danger rounded-pill position-absolute top-0">{{$show_cart}}</span>
      </a>
    </li>
    @endauth
    @auth
    <div class="dropdown">
      <a class="btn text-light dropdown-toggle border-0 my-2" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">

        <img src="{{auth()->user()->avatar}}" width="30" height="30" class="rounded-circle mt-1">

        {{auth()->user()->name}}

      </a>

      <ul class="dropdown-menu">
        <li>
          <form action="/logout" method="POST">@csrf

            <button type="submit" class="btn m-2" style="border:none;">ထွက်မည်</button>

          </form>
        </li>

      </ul>
    </div>
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