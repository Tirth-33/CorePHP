<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use App\Notifications\BlogPostPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BlogPostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blogPost = BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id(),
            'published_at' => now(),
        ]);

        // Send notification to all users
        $users = User::all();
        Notification::send($users, new BlogPostPublished($blogPost));

        return response()->json([
            'message' => 'Blog post published and notifications sent!',
            'post' => $blogPost
        ]);
    }

    public function publish($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update(['published_at' => now()]);

        // Send notification to all users
        $users = User::all();
        Notification::send($users, new BlogPostPublished($blogPost));

        return response()->json([
            'message' => 'Blog post published and notifications queued!',
            'post' => $blogPost
        ]);
    }
}