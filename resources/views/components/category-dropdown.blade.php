<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{isset($currentCategory) ? $currentCategory->name : "Dropdown button"}}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/">All</a></li>
      @foreach ($categories as $category)
        <li><a class="dropdown-item" href="/?category={{$category->slug}}{{ request('search') ? '&search='.request('search') : '' }}{{ request('username') ? '&username='.request('username') : '' }}">{{$category->name}}</a></li>
      @endforeach
    </ul>
  </div>