<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Philosloth</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{ Request::is('/blog' ? "nav-item active" : "nav-item") }}">
        <a class="nav-link" href="/blog">Blog <span class="sr-only">(current)</span></a>
      </li>
      <li class="{{ Request::is('/blog/archive' ? "nav-item active" : "nav-item") }}">
        <a class="nav-link" href="/blog/archive">Archive</a>
      </li>
      <li class="{{ Request::is('/contact' ? "nav-item active" : "nav-item") }}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    </ul>
    @if (Auth::check())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hello {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
        <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
        <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
      </div>

    @else

      <a href="{{ route('login') }}" class="btn btn-default">Login</a>

    @endif

    </li>
  </div>
</nav>
