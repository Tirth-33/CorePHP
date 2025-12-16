@extends('layout')

@section('title', 'Welcome')

@section('content')
<h1>Welcome to User Auth System</h1>
<p>A simple user registration and authentication system with email verification.</p>

<div class="nav">
    @auth
        <p>Hello, {{ auth()->user()->username }}!</p>
        <a href="{{ route('dashboard') }}">Go to Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline; margin-left: 10px;">
            @csrf
            <button type="submit" style="background: #dc3545; width: auto; padding: 5px 10px;">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a> | 
        <a href="{{ route('register') }}">Register</a>
    @endauth
</div>
@endsection