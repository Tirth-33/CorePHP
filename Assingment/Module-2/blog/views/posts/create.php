<h2>Create Post</h2>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
<form method="post" action="index.php?action=store" class="mb-4">
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($title ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea class="form-control" name="body" rows="8" required><?php echo htmlspecialchars($body ?? ''); ?></textarea>
    </div>
    <button class="btn btn-success" type="submit">Create</button>
    <a class="btn btn-secondary" href="index.php">Cancel</a>
</form>