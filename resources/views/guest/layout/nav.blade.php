<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand js-scroll-trigger" href="/">
        SPP Muhammadiyah
    </a>
        <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if(Auth::guard('siswas')->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::guard('siswas')->user()->nisn }}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/profile/{{ Auth::guard('siswas')->user()->id }}">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="/logout" class="mx-0 mx-lg-1" method="POST">
                            @csrf
                            <button type="button" onclick="popUp({
                                'title' : 'Yakin ingin keluar?',
                                'formElement' : this.form,
                                'confirmText' : 'Ya, keluar'
                            })" class="dropdown-item" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </button>
                        </form>
                      </li>
                    </ul>
                  </li>
                  
                @else
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/admin/login">LOGIN ADMIN</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/login">LOGIN SISWA</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>