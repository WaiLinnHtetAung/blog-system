<x-layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div class="mb-3">
            <div>Author - <a href="/author/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div class="badge bg-primary"><a class="text-decoration-none text-white" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></div>
            <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
            <div class="text-secondary my-2">
              <form action="/blog/{{$blog->slug}}/subscription" method="post">
                @csrf
                @auth
                  @if(auth()->user()->isSubscribed($blog))
                  <button class="btn btn-danger">UnSubscribe</button>
                  @else
                    <button class="btn btn-warning">Subscribe</button>
                  @endif
                @endauth
              </form>
            </div>
          </div>
          <p class="lh-md">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>

    @auth
      <x-comment-form :blog="$blog"/>
    @else
      <p class="text-center">Please <a href="/login">login</a> to participate discussion.</p>
    @endauth

    @if($blog->comments->count())
      <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif
    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>