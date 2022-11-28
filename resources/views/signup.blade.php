@extends('base')
@section('main')

<div class="row pt-5">
    <div class="p-5 border col-4 mx-auto">
        <h1 class="text-center">SIGN UP</h1>
        <form action="{{ route('auth.signup') }}" method="post" class="col-3 d-inline-block text-start w-100"
            autocomplete="on">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
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
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <div class="small text-center mt-3">Don't have an account?
                <a href="/signup">
                    Sign Up
            </div>
            </a>
        </form>
    </div>
</div>

@endsection