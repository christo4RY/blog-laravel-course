<x-layout>
    <div class="container">
        <div class="row my-4">
            <h1 class="text-primary text-center mb-3">Loin Form</h1>
            <div class="col-md-6 mx-auto">
                @error('login_fail')
                    <p class="alert alert-danger text-center">{{ $message }}</p>
                @enderror
                <div class="card p-3">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" required name="email" value="{{ old('email') }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <x-error name="email" />
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" required name="password" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <x-error name="password" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
