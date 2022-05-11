{{-- Navbar Starts --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" style="color: darkblue">Social Network</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
              </li>
            </ul>
          </div>
          <a class="btn btn-info mx-3" href="{{route('account')}}">Account</a>
          <a class="btn btn-danger" href="{{route('logout')}}">Logout</a>
        </div>
      </nav>
</header>
{{-- Navbar ends --}}