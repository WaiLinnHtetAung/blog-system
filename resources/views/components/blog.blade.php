<div class="card">
    <img
      src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{ $blog->title }}</h3>
      <div class="mb-3">
        <div>Author - <a href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></div>
        <div class="badge bg-primary"><a class="text-decoration-none text-white" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></div>
        <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
      </div>
     
      <p class="card-text">
        {{$blog->intro}}
      </p>
      <a href="/blog/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
  </div>