@extends('layout')

@section('title', 'Dashboard')
@section('container-class', 'dashboard')

@section('content')
<h1>Dashboard</h1>

@if (session('verified'))
    <div class="success">Your email has been verified successfully!</div>
@endif

<div class="user-info">
    <h3>User Information</h3>
    <p><strong>Username:</strong> {{ auth()->user()->username }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Email Verified:</strong> {{ auth()->user()->hasVerifiedEmail() ? 'Yes' : 'No' }}</p>
    <p><strong>Member Since:</strong> {{ auth()->user()->created_at->format('F j, Y') }}</p>
</div>

<div class="nav">
    <a href="{{ url('/') }}">Home</a>
    <form method="POST" action="{{ route('logout') }}" style="display: inline; margin-left: 10px;">
        @csrf
        <button type="submit" style="background: #dc3545; width: auto; padding: 5px 10px;">Logout</button>
    </form>
</div>
@endsection