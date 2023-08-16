<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    {{-- Google font import --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,400;10..48,500&family=Raleway:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">


    {{--Import Cdn Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Paintings</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">about</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Lanscape</a></li>
                  <li><a class="dropdown-item" href="#">Potraits</a></li>
                </ul>
              </li>
            </ul>
            @if (!auth()->check())
                <ul class="navabr-nav ms-auto mb-2 mb-lg-0 mr-5" style="list-style: none; display: flex;">
                    <li class="nav-item mx-2 btn btn-primary">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item mx-2 btn btn-primary">
                        <a class="nav-link" href="/register">Sign In</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif
            @if (auth()->check())
                <ul class="navabr-nav ms-auto mb-2 mb-lg-0 mr-5" style="list-style: none; display: flex;">
                    <li class="nav-item btn btn-primary mx-2">
                        <a class="nav-link" href="{{route('profile')}}">Profile</a>
                    </li>
                    <li class="nav-item btn btn-primary mx-2">
                        <a class="nav-link" href="{{route('addPaintings.create')}}">Add</a>
                    </li>
                    <form action="/logout" method="post" class="mx-2">
                      @csrf
                      <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif
          </div>
        </div>
      </nav>



      @yield('content')







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>