 <ul id="secondaryNavbar" class="navbar-nav ml-auto justify-content-end flex-row align-items-center pr-4">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link text-dark mr-3 secondaryNavLink" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="text-dark nav-link secondaryNavLink" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle pb-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->profileImage)
                    <img id="userImage" src="{{ Auth::user()->profileImage }}" alt="User Avatar"> 
                @else    
                    <img id="userImage" src="/img/avatar.png" alt="User Avatar"> 
                @endif
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="pl-4 dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="text-dark dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
    <li id="dropdownMenuOpener" class="nav-item dropdown mx-3">
            <a id="helpTab" class="text-dark nav-link secondaryNavLink" href="#">
                Help
            </a>

            <div id="primaryDropdownMenu" class="dropdown-menu dropdown-menu-right">
                <a class="text-dark dropdown-item" href="#">
                    Contact Us
                </a>
                <a class="text-dark dropdown-item" href="#">
                    About Us
                </a>
                <a class="text-dark dropdown-item" href="#">
                    Customer Service
                </a>
            </div>
    </li>
    <a class="fas fa-shopping-cart" style="font-size: 18px;"></a> 
</ul>

