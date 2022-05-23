{{-- Navbar Starts --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" style="color: darkblue">Library Management System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="{{route('bookslist')}}" class="nav-link" aria-current="page">Books</a>
              </li>
              <li class="nav-item">
                <a href="{{route('addauthor')}}" class="nav-link" aria-current="page">Author</a>
              </li>
            </ul>
          </div>
          {{-- <a class="btn btn-info mx-3" href="{{route('account')}}">Account</a> --}}
          <a class="btn btn-danger" href={{route('logout')}}>Logout</a>
        </div>
      </nav>
</header>
{{-- Navbar ends --}}
 
</body>
</html>