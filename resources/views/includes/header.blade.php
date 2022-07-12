<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <i class="fa-brands fa-instagram ms-5 me-2"></i>Instagram</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav  ms-auto me-5 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose Language
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="{{route('langChange',['locale'=>'hi'])}}" class="dropdown-item">Hindi</a></li>
                    <li><a href="{{route('langChange',['locale'=>'en'])}}" class="dropdown-item">English</a></li>
                    </ul>
              </li>
            </ul>
        </div>
    </nav>
</header>
