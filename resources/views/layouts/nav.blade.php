<nav>
  <div class="nav-wrapper">
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      @if (auth()->check())
        <li><a href="logout">logout</a></li>
        <li><a href="/dashboard">{{auth()->user()->name}}</a></li>
      @else
        <li><a href="/login">login</a></li>
        <li><a href="/register">sign up</a></li>
      @endif
    </ul>
  </div>
</nav>
