    <nav class="site-header sticky-top py-1 bg-dark">
       
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="/" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="/">Home</a>
    <a class="py-2 d-none d-md-inline-block" href="/about">About</a>
    <a class="py-2 d-none d-md-inline-block" href="/service">Services</a>
    <a class="py-2 d-none d-md-inline-block" href="/post">Blog</a>
    <a class="py-2 d-none d-md-inline-block btn btn-danger" href="/post/create">Create blog</a>
                 @guest
                           
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          
                            @if (Route::has('register'))
                          
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            
                            @endif
                        @else
                        
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

  </div>
</nav>