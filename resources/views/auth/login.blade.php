<x-layout>
    <x-slot name="title">Login</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-4 border p-5">
                <img class="img-login" src="/img/logo.png" alt="">
                <h1>Login</h1>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="example@email.com" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
