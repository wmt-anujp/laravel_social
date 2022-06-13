<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <i class="fa-brands fa-instagram ms-5 me-2"></i>Instagram</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                    @if (Auth::guard('user')->check())
                        <li class="nav-item me-4">
                            <a href="{{route('user.Post')}}" class="nav-link {{(request()->is('user-posts','post')) ? 'active' : ''}}">Posts</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{route('user.Feed')}}" class="nav-link {{(request()->is('user-feed')) ? 'active' : ''}}">Feed</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{route('user.Account')}}" class="nav-link {{(request()->is('user-account')) ? 'active' : ''}}">Account</a>
                        </li>
                    @endif
                        <li class="nav-item me-4">
                            <a href="{{(Auth::guard('admin')->check() ? route('admin.Logout'): route('user.Logout') )}}" class="nav-link btn btn-sm btn-danger" style="color: white">Logout</a>
                        </li>
                </ul>
                    {{-- @if (Auth::guard('admin')->check())
                    <li class="nav-item dropdown">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-8">
                                <a class="btn btn-sm btn-danger" href="{{route('admin.Logout')}}">Logout</a>
                            </div>
                        </div>
                    </li>
                    @elseif(Auth::guard('user')->check())
                        <li class="nav-item dropdown">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-8">
                                    <a class="btn btn-sm btn-danger" href="{{route('user.Logout')}}">Logout</a>
                                </div>
                            </div>
                        </li>
                    @endif --}}
                    {{-- @auth('user') --}}
                        
                    {{-- @endauth --}}
            </div>
        </div>
    </nav>
</header>
