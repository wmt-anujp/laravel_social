<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('user.Feed')}}">
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
                            <a href="{{route('user.Post')}}" class="nav-link {{(request()->is('user-posts','post')) ? 'active' : ''}}">{{__('message.Posttitle')}}</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{route('user.Feed')}}" class="nav-link {{(request()->is('user-feed')) ? 'active' : ''}}">{{__('message.Feedtitle')}}</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{route('user.Account')}}" class="nav-link {{(request()->is('user-account')) ? 'active' : ''}}">{{__('message.Accounttitle')}}</a>
                        </li>
                    @endif
                        <li class="nav-item me-4">
                            <a href="{{(Auth::guard('admin')->check() ? route('admin.Logout'): route('user.Logout') )}}" class="nav-link btn btn-sm btn-danger" style="color: white">{{__('message.Logout')}}</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
