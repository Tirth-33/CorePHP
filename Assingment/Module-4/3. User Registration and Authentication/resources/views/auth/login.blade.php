@extends('layout')

@section('title', 'Login')

@section('content')
<h2>Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    
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
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <button type="submit">Login</button>
</form>

<div class="nav">
    <a href="{{ route('register') }}">Don't have an account? Register</a>
</div>
@endsection