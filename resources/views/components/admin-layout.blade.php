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
          <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-people"></i>
            <span class="d-none d-lg-inline">Users</span>
            <span class="d-none d-lg-inline badge bg-danger
            rounded-pill float-end">20</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <i class="bi bi-journal-check"></i>
            <span class="d-none d-lg-inline">Check Blogs</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <i class="bi bi-bell"></i>
            <span class="d-none d-lg-inline">Check Notifications</span>
            </a>
            <a href="/admin/blogs/create" class="list-group-item list-group-item-action">
              <i class="bi bi-file-earmark-plus"></i>
            <span class="d-none d-lg-inline">Create Blogs</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <i class="bi bi-patch-plus"></i>
            <span class="d-none d-lg-inline">Add Livestock food</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <i class="bi bi-capsule"></i>
            <span class="d-none d-lg-inline">Add Medicine</span>
            </a>
            <a href="/" class="list-group-item list-group-item-action">
            <span class="d-none d-lg-inline">
              <form action="/logout" method="POST">@csrf
                <button type="submit" href="" class="nav-link btn btn-link"><i class="bi bi-arrow-down-left-circle-fill me-2"></i>Admin Logout</button>
              </form>
            </span>
            </a>
            </div>
            
            
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

