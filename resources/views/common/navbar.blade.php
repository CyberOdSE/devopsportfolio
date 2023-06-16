<nav class="navbar py-0 navbar-expand-lg navbar-light navbar-laravel" role="navigation" aria-label="main navigation">
    <div class="container div2" id="navbarBasicExample navbar-menu">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @guest
                <ul class="navbar-nav mr-auto">
                    <li class="{{ Request::path() === '/' ? 'nav-item active': 'nav-item' }}" style="margin-left: 0">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mr-auto">
                    <div class="navbar-start">
                        <a class="button" href="{{ route('APIInsertData.storeCustomer') }}">
                            TestAPI
                        </a>
                        <a class="navbar-item" href="/dashboard">
                            Live Situation
                        </a>

                        <a class="navbar-item" href="/level2">
                            Performances
                        </a>

                        <a class="navbar-item" href="/level3">
                            Customers
                        </a>

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Settings
                            </a>

                            <div class="navbar-dropdown has-shadow">
                                <a class="navbar-item" href="/routes">
                                    Routes
                                </a>
                                <a class="navbar-item" href="/users">
                                    Users
                                </a>
                            </div>
                        </div>
                    </div>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <select class="navbar-item control">
                        <option selected>ENG</option>
                        <option>NL</option>
                    </select>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Profile
                        </a>

                        <div class="navbar-dropdown has-shadow">
                            <a class="navbar-item" href="{{ route('profile') }}">View Profile</a>
                        </div>
                    </div>

                    <li class="nav-item control">
                        <a class="navbar-item is-active" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>
                </ul>
            @endguest

        </div>
    </div>
</nav>

