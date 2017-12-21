<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper deep-purple">
      <a href="/" class="brand-logo" style="padding-left:1em;">Stockr</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if (auth()->check())
          <li><a href="/stocks">View All Stocks</a></li>
          <li><a href="/users">View Users</a></li>
          <li><a href="logout">Logout</a></li>
          <li><a href="/dashboard">{{auth()->user()->name}}</a></li>
        @else
          <li><a href="/login">login</a></li>
          <li><a href="/register">sign up</a></li>
        @endif
      </ul>
    </div>
  </nav>
</div>
