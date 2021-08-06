<!-- Navigation -->
<style>
.navbar.navbar-light{
  background-color:#183A64 !important
} 
</style>
    <nav style="background-color:#E7FFFE"
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img class=" d-block" height="60px" src="/images/LOGO6.png" alt="" />
        </a>
        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('home') }}" style="color:#FFFFFF">Home </a>
              
            </li>
            <li class="nav-item {{ (request()->is('/categories*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('categories') }}" style="color:#FFFFFF">Categories</a>
            </li>

            <li class="nav-item {{ (request()->is('/troubleshoot*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('home-troubleshoot') }}"style="color:#FFFFFF">Articles</a>
            </li>

            @guest
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
              </li> --}}
              <li class="nav-item">
                <a
                  class="btn btn-primary nav-link px-4 text-white"
                  href="{{ route('login') }}"
                  >Sign In</a
                >
              </li>
            @endguest
          </ul>

          @auth
              <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    style="color:#FFFFFF"
                  >
                    <img
                      src="/images/user-icon.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    Hi, {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    @php 
                      $roles = Auth::user()->roles;
                      // dd($roles);
                    @endphp 

                    @if ($roles == 'ADMIN')
                      <a class="dropdown-item" href="{{ route('admin-dashboard') }}"
                        >Dashboard</a
                      > 
                    @else
                      <a class="dropdown-item" href="{{ route('dashboard') }}"
                        >Dashboard</a
                      > 
                    @endif

                    
                    
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    class="dropdown-item">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                    @php 
                      $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp 

                    @if ($carts > 0)
                      <img src="images/icon-cart-filled.svg" alt="" />
                      <div class="badge badge-primary">{{ $carts }}</div>
                    @else
                      <img src="/images/icon-cart-empty.svg" alt="" />  
                    @endif
                    
                  </a>
                </li>
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#"  style="color:#FFFFFF">
                    Hi, {{ Auth::user()->name }}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                    @php 
                      $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp 

                    @if ($carts > 0)
                      <img src="images/icon-cart-filled.svg" alt="" />
                      <div class="badge badge-primary">{{ $carts }}</div>
                    @else
                      <img src="/images/icon-cart-empty.svg" alt="" />  
                    @endif
                    
                  </a>
                </li>
              </ul>
          @endauth
        </div>
      </div>
    </nav>