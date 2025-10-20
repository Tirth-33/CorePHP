<div class="mb-3">
    <a href="index.php" class="text-decoration-none">&larr; Back to posts</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h2>
        <p class="text-muted small"><?php echo htmlspecialchars($post['created_at']); ?><?php if (!empty($post['updated_at'])) echo ' (updated '.htmlspecialchars($post['updated_at']).')'; ?></p>
        <div class="card-text"><?php echo nl2br(htmlspecialchars($post['body'])); ?></div>
        <div class="mt-3">
            <a class="btn btn-outline-secondary btn-sm" href="index.php?action=edit&id=<?php echo $post['id']; ?>">Edit</a>
            <a class="btn btn-outline-danger btn-sm" href="index.php?action=delete&id=<?php echo $post['id']; ?>" onclick="return confirm('Delete this post?')">Delete</a>
        </div>
    </div>
</div>

<h4 class="mb-3">Comments</h4>

<?php if (!empty($_GET['error'])): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
<?php endif; ?>

<?php if (empty($comments)): ?>
    <div class="alert alert-info">No comments yet.</div>
<?php else: ?>
    <div class="list-group mb-4">
        <?php foreach ($comments as $c): ?>
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <strong><?php echo htmlspecialchars($c['author']); ?></strong>
                    <small class="text-muted"><?php echo htmlspecialchars($c['created_at']); ?></small>
                </div>
                <p class="mb-2"><?php echo nl2br(htmlspecialchars($c['body'])); ?></p>
                <div>
                    <a class="btn btn-sm btn-link" href="index.php?action=comment_edit&id=<?php echo $c['id']; ?>">Edit</a>
                    <a class="btn btn-sm btn-link text-danger" href="index.php?action=comment_delete&id=<?php echo $c['id']; ?>" onclick="return confirm('Delete this comment?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add a comment</h5>
        <form method="post" action="index.php?action=comment_store">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Your name</label>
                <input class="form-control" type="text" name="author" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea class="form-control" name="body" rows="4" required></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Post comment</button>
        </form>
    </div>
</div>