@extends('layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>All Posts</h2>
    <a href="{{ route('posts.create') }}" class="btn">New Post</a>
</div>

@forelse($posts as $post)
    <div class="post">
        <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
        <p>{{ Str::limit($post->content, 150) }}</p>
        <small>{{ $post->created_at->format('M d, Y') }}</small>
    </div>
@empty
    <p>No posts yet. <a href="{{ route('posts.create') }}">Create the first one!</a></p>
@endforelse
@endsection