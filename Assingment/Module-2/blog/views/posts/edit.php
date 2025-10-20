<h2>Edit Post</h2>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
<form method="post" action="index.php?action=update&id=<?php echo $post['id']; ?>" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea class="form-control" name="body" rows="8" required><?php echo htmlspecialchars($post['body']); ?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="index.php?action=show&id=<?php echo $post['id']; ?>">Cancel</a>
</form>