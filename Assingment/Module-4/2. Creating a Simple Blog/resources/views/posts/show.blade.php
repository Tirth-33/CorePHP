@extends('layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>{{ $post->title }}</h2>
    <div>
        <a href="{{ route('posts.edit', $post) }}" class="btn">Edit</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
        </form>
    </div>
</div>

<div style="margin: 20px 0;">
    <p>{{ nl2br(e($post->content)) }}</p>
</div>

<small>Published: {{ $post->created_at->format('M d, Y at g:i A') }}</small>
@endsection