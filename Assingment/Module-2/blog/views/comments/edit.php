<h2>Edit Comment</h2>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
<form method="post" action="index.php?action=comment_update&id=<?php echo $comment['id']; ?>" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Author</label>
        <input class="form-control" type="text" name="author" value="<?php echo htmlspecialchars($comment['author']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea class="form-control" name="body" rows="6" required><?php echo htmlspecialchars($comment['body']); ?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="index.php?action=show&id=<?php echo $comment['post_id']; ?>">Back</a>
</form>