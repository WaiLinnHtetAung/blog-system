@props(['blog'])
<div class="container">
    <div class="col-md-8 mx-auto">
      <x-card-wrapper class="bg-secondary">
        <form method="POST" action="/blogs/{{$blog->slug}}/comments">
          @csrf
          <div class="mb-3">
            <textarea name="body" id="" cols="20" rows="5" placeholder="say something..." class="form-control border border-0"></textarea>
            <x-error name="body" />
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </x-card-wrapper>
  </div>