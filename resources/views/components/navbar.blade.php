<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="./index.html">Creative Coder</a>
    <div class="d-flex">
      <a href="/#blogs" class="nav-link">Blogs</a>
      @auth
        <div>
          <img src="{{auth()->user()->avatar}}" width="35" height="35" class="rounded-circle" alt="">
        </div>
        <a href="" class="nav-link">{{auth()->user()->username}}</a>
        <form action="/logout" method="post"> 
          @csrf
          <button class="nav-link btn btn-link">Logout</button>
        </form>
      @else
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
      @endauth
      <a href="#subscribe" class="nav-link">Subscribe</a>
    </div>
  </div>
</nav>