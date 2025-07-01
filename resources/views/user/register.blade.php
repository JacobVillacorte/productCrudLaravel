
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mb-4 text-center" style="color: purple;">Register</h3>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" style="color: purple;">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" style="color: purple;">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" style="color: purple;">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" style="color: purple;">Confirm Password</label>
                    <input type="password" class="form-control"
                           id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn w-100" style="background-color: purple; color: white;">Create Account</button>
            </form>

            <div class="mt-3 text-center">
                <span style="color: purple;">Already registered?</span> <a href="{{ route('login') }}" style="color: purple; font-weight: bold;">Login here</a>
            </div>
        </div>
    </div>
</div>
@endsection