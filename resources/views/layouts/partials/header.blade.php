<nav class="navbar-custom">
    <ul class="list-inline float-right mb-0">
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link waves-effect waves-light nav-user"
               href="/carrinho" role="button"
               aria-haspopup="false" aria-expanded="false"
               style="line-height: 1.8">
                <i class="mdi mdi-cart" style="font-size: 2.5em;"></i>
            </a>
        </li>
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
               href="" role="button"
               aria-haspopup="false" aria-expanded="false"
               style="line-height: 1.8">
                <i class="mdi mdi-account-circle" style="font-size: 2.5em;"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
            @if(Auth::check())
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="text-overflow">
                        <small>
                            {{ Auth::user()->Nome_Comp }}
                        </small>
                    </h5>
                </div>

                <!-- item-->
                <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account"></i> <span>Perfil</span>
                </a>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout"></i> <span>Sair</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-login-variant"></i> <span>Login</span>
                </a>
            @endif
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>

</nav>