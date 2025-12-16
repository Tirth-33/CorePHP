<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BlogPostPublished extends Notification implements ShouldQueue
{
    use Queueable;

    public $blogPost;

    public function __construct($blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Blog Post Published: ' . $this->blogPost->title)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('A new blog post has been published.')
            ->line('Title: ' . $this->blogPost->title)
            ->action('Read Post', url('/posts/' . $this->blogPost->id))
            ->line('Thank you for subscribing to our blog!');
    }
}