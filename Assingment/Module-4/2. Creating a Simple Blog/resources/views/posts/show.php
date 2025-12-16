<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2><?= htmlspecialchars($post->title) ?></h2>
    <div>
        <a href="index.php?method=edit&id=<?= $post->id ?>" class="btn">Edit</a>
        <a href="index.php?method=delete&id=<?= $post->id ?>" class="btn btn-danger" onclick="return confirm('Delete this post?')">Delete</a>
    </div>
</div>

<div style="margin: 20px 0;">
    <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
</div>

<small>Published: <?= date('M d, Y \a\t g:i A', strtotime($post->created_at)) ?></small>