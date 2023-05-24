<header>
    <!-- Fixed navbar -->
    <nav>
        <div class="container navbar-container">
            <a class="brand" href="/">Amazing E-Grocery</a>
            @if (auth()->user())
                <div class="buttons">
                    <a class="btn" href="javascript:void" onclick="document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <div class="buttons">
                    <a class="btn" href="{{ route('login') }}">Login</a>
                    <a class="btn" href="{{ route('register') }}">Register</a>
                </div>
            @endif
        </div>
    </nav>
    @if (Auth::user())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (Request::segment(1) == 'home') ? ' active' : ''  }} mx-3" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::segment(1) == 'cart') ? ' active' : ''  }} mx-3" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::segment(1) == 'profile') ? ' active' : ''  }} mx-3" href="/profile">Profile</a>
                </li>
                @if (Auth::user() && Auth::user()->role->role_name == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'account-maintenance') ? ' active' : ''  }} mx-3" href="{{ route('admin.account') }}">Account Maintenance</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</header>
