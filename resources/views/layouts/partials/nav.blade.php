<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">CodeHub</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        
        @if(Auth::check())
          <li><a>Welcome,{{ Auth::user()->name}}</a></li>
          <li><a href="{{ route('get_post') }}">Question</a></li>
           <li><a href="{{ route('get_logout') }}">Logout</a></li>
        @else
          <li><a href="{{ route('get_login') }}">Login</a></li>
          <li><a href="{{ route('get_register') }}">Register</a></li>
        @endif
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>