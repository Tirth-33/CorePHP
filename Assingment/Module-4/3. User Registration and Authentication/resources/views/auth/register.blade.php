@extends('layout')

@section('title', 'Register')

@section('content')
<h2>Register</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        @error('username')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>

<div class="nav">
    <a href="{{ route('login') }}">Already have an account? Login</a>
</div>
@endsection