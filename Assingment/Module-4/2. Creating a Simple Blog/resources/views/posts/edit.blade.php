@extends('layout')

@section('content')
<h2>Edit Post</h2>

<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        @error('title')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label>Content:</label>
        <textarea name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
        @error('content')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn">Update Post</button>
    <a href="{{ route('posts.show', $post) }}">Cancel</a>
</form>
@endsection