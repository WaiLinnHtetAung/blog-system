<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card my-3 p-4 shadow-sm">
                    <form method="post">
                        @csrf
                        <h3 class="text-primary text-center my-3">Register Form</h3>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                          <x-error name="email" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                          <x-error name="password" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</x-layout>