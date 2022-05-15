<x-layout>
    <x-slot name="title">Sign In</x-slot>
    

    
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-4 border py-5">
                <img class="img-login" src="/img/logo.png" alt="">
                <h1>Sign In</h1>
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="username">
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@email.com" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password confirmation</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error("password_confirmation") <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>