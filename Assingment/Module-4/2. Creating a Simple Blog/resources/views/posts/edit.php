<h2>Edit Post</h2>

<form method="POST" action="index.php?method=update&id=<?= $post->id ?>">
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post->title) ?>" required>
    </div>

    <div class="form-group">
        <label>Content:</label>
        <textarea name="content" rows="10" required><?= htmlspecialchars($post->content) ?></textarea>
    </div>

    <button type="submit" class="btn">Update Post</button>
    <a href="index.php?method=show&id=<?= $post->id ?>">Cancel</a>
</form>