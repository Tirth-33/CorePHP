@extends('layout')

@section('title', 'Verify Email')

@section('content')
<h2>Verify Your Email Address</h2>

@if (session('message'))
    <div class="success">{{ session('message') }}</div>
@endif

<p>Before continuing, please check your email for a verification link. If you didn't receive the email, click the button below to request another.</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>

<div class="nav">
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" style="background: #dc3545; width: auto; padding: 5px 10px;">Logout</button>
    </form>
</div>
@endsection