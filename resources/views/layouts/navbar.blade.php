 {{-- <header>
     <nav>
        <h4>TravelIn</h4>
        <ul>
            <li><a href="#">Discover</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Comunity</a></li>
            @guest
            <li><a href="#">Register</a></li>
            <li><a href="#">Login</a></li>
            @endguest

            @auth
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
                <form method="POST" action="{{ url('/logout') }}">
                @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
                <div class="dropdown-divider"></div>
            </div>
            @endauth
        </ul>
        <i class="bi bi-list"></i>
    </nav>
 </header> --}}
