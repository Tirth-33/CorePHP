<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>All Posts</h2>
    <a href="index.php?method=create" class="btn">New Post</a>
</div>

<?php if (!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="post">
            <h3><a href="index.php?method=show&id=<?= $post->id ?>"><?= htmlspecialchars($post->title) ?></a></h3>
            <p><?= htmlspecialchars(substr($post->content, 0, 150)) ?>...</p>
            <small><?= date('M d, Y', strtotime($post->created_at)) ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts yet. <a href="index.php?method=create">Create the first one!</a></p>
<?php endif; ?>