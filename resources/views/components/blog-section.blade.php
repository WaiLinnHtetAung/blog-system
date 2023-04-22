@props(['blogs', 'categories', 'currentCategory'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
      <x-category-dropdown />
    </div>
    <form action="/" class="my-3">
      <div class="input-group mb-3">
        @if(request('category')) 
          <input
          type="hidden"
          name="category"
        />
        @endif

        @if(request('username')) 
          <input
          type="hidden"
          name="username"
        />
        @endif
        
        <input
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
          name="search"
          value="{{ request('search') }}"
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
      @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
          <x-blog :blog="$blog"/>
        </div>
      @empty 
        <p class="text-danger">No matching results</p>
      @endforelse

      {{$blogs->links()}}
    </div>
  </section>