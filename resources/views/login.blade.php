@extends('base')
@section('main')
<div class="d-flex vh-100 justify-content-center align-items-center">
    <div class="text-center p-5 border col-4">
        <h1>LOGIN</h1>
        {{-- flash msg if user login error --}}
        @if (session()->has('msg'))
        <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
            {{ session()->get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('succ'))
        <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
            {{ session()->get('succ') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('auth.login') }}" method="post" class="col-3 d-inline-block text-start w-100"
            autocomplete="on">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <a href="/forgot-password"><small>Forgot password</small></a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="small text-center mt-3">Don't have an account?
                <a href="/signup">
                    Sign Up
            </div>
            </a>
        </form>
    </div>
</div>

@endsection