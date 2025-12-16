<h2>Create New Post</h2>

<form method="POST" action="index.php?method=store">
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" required>
    </div>

    <div class="form-group">
        <label>Content:</label>
        <textarea name="content" rows="10" required></textarea>
    </div>

    <button type="submit" class="btn">Create Post</button>
    <a href="index.php">Cancel</a>
</form>