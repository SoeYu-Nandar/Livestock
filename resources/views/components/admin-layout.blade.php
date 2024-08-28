<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> 
<div class="container-fluid p-0 m-0">
  <div class="row g-0">
      <nav class="col-2 bg-dark-subtle p-3">
        <h1 class="h4 py-1 text-center text-primary">
          <i class="bi bi-person-lines-fill"></i>
          <span class="d-none d-lg-inline">
          ADMIN DASHBOARD
          </span>
        </h1>
        <div class="list-group text-center text-lg-start">
          <span class="list-group-item disabled d-none d-lg-block">
          <small>CONTROLS</small>
          </span>
          <a href="/admin/dashboard" class="list-group-item list-group-item-action active">
            <i class="bi bi-house-door"></i>
          <span class="d-none d-lg-inline">Dashboard</span>
          </a>
          <a class="nav-link list-group-item list-group-item-action" data-bs-toggle="collapse" href="#breeding" aria-expanded="false" aria-controls="breeding">
            <i class="bi bi-check-circle"></i>
            <span class="menu-title d-none d-lg-inline">Breeding List</span>
          </a>
        <div class="collapse" id="breeding">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/chicken_breeding/show"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Chicken breeding</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/pig_breeding/show"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Pig breeding</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/fish_breeding/show"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Fish breeding</span>
              </a>
            </li>
          </ul>
        </div>
            <a href="/admin/blogs/show" class="list-group-item list-group-item-action">
              <i class="bi bi-journal-check"></i>
            <span class="d-none d-lg-inline">Blogs List</span>
            </a>
            <a href="/admin/medicines/show" class="list-group-item list-group-item-action">
              <i class="bi bi-shield-check"></i>
            <span class="d-none d-lg-inline">Medicine List</span>
            </a>
            
              <a class="nav-link list-group-item list-group-item-action" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="bi bi-patch-check"></i>
                <span class="menu-title d-none d-lg-inline">Livestock List</span>
              </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/chicken_food/show"> 
                    <i class="bi bi-ui-checks ms-2"></i>
                    <span>Chicken food</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/pig_food/show"> 
                    <i class="bi bi-ui-checks ms-2"></i>
                    <span>Pig food</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/duck_food/show"> 
                    <i class="bi bi-ui-checks ms-2"></i>
                    <span>Duck food</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/cow_food/show"> 
                    <i class="bi bi-ui-checks ms-2"></i>
                    <span>Cow food</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/fish_food/show"> 
                    <i class="bi bi-ui-checks ms-2"></i>
                    <span>Fish food</span>
                  </a>
                </li>
              </ul>
            </div>
            <a href="/admin/payments/show" class="list-group-item list-group-item-action">
              <i class="bi bi-wallet"></i>
            <span class="d-none d-lg-inline">Payment List</span>
            </a>
            <a href="/" class="list-group-item list-group-item-action">
              <span class="d-none d-lg-inline">
                <form action="/logout" method="POST">@csrf
                  <button type="submit" href="" class="nav-link btn btn-link"><i class="bi bi-arrow-down-left-circle-fill me-2"></i>Admin Logout</button>
                </form>
              </span>
              </a>

            <div class="list-group mt-4 text-center text-lg-start">
              <span class="list-group-item disabled d-none d-lg-block">
              <small>ACTIONS</small>
              </span>
            <a href="/admin/blogs/create" class="list-group-item list-group-item-action">
              <i class="bi bi-file-earmark-plus"></i>
            <span class="d-none d-lg-inline">Create Blogs</span>
            </a>
            <a href="/admin/medicines/create" class="list-group-item list-group-item-action">
              <i class="bi bi-capsule"></i>
            <span class="d-none d-lg-inline">Add Medicine</span>
            </a>
            <a class="nav-link list-group-item list-group-item-action" data-bs-toggle="collapse" href="#livestock" aria-expanded="false" aria-controls="livestock">
              <i class="bi bi-patch-check"></i>
              <span class="menu-title d-none d-lg-inline">Add Livestock List</span>
            </a>
          <div class="collapse" id="livestock">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/chicken_food/create"> 
                  <i class="bi bi-ui-checks ms-2"></i>
                  <span>Chicken food</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/pig_food/create"> 
                  <i class="bi bi-ui-checks ms-2"></i>
                  <span>Pig food</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/duck_food/create"> 
                  <i class="bi bi-ui-checks ms-2"></i>
                  <span>Duck food</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/cow_food/create"> 
                  <i class="bi bi-ui-checks ms-2"></i>
                  <span>Cow food</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action" href="/admin/foods/fish_food/create"> 
                  <i class="bi bi-ui-checks ms-2"></i>
                  <span>Fish food</span>
                </a>
              </li>
            </ul>
          </div>
          <a class="nav-link list-group-item list-group-item-action" data-bs-toggle="collapse" href="#abreeding" aria-expanded="false" aria-controls="abreeding">
            <i class="bi bi-check-circle"></i>
            <span class="menu-title d-none d-lg-inline">Add Breeding List</span>
          </a>
        <div class="collapse" id="abreeding">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/chicken_breeding/create"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Chicken breeding</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/pig_breeding/create"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Pig breeding</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link list-group-item list-group-item-action" href="/admin/breedings/fish_breeding/create"> 
                <i class="bi bi-building-add ms-2"></i>
                <span>Fish breeding</span>
              </a>
            </li>
          </ul>
        </div>
            <a href="/admin/faq" class="list-group-item list-group-item-action">
              <i class="bi bi-reply-all"></i>
            <span class="d-none d-lg-inline">Reply FAQ section</span>
            </a>
           
            </div>
          </div>         
            {{--slide bar--}}
      </nav>
        <main class="col-10 bg-body-secondary">
          <nav class="navbar navbar-expand-lg navbar-light bg-dark-subtle">
            <div class="flex-fill"></div>
            <div class="navbar nav">
              @auth
              @can('admin')
                <a href="/admin/dashboard" class="nav-link">Dashboard</a>
              @endcan
            <img src="{{auth()->user()->avatar}}" width="30" height="30" class="rounded-circle mt-3">
              <li class="nav-item mt-3 ms-2 me-2">
                {{auth()->user()->name}}
              </li>            
              @endauth
            
            </div>
          </nav>
          {{$slot}}
          
        </main>
  </div>
</div>

    </body>
    <footer>
      <p class="text-center bg-secondary py-4">&copy Admin</p>
    </footer>
    
</html>

