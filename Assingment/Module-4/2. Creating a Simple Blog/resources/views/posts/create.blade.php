@extends('layout')

@section('content')
<h2>Create New Post</h2>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
        @error('title')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label>Content:</label>
        <textarea name="content" rows="10" required>{{ old('content') }}</textarea>
        @error('content')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn">Create Post</button>
    <a href="{{ route('posts.index') }}">Cancel</a>
</form>
@endsection