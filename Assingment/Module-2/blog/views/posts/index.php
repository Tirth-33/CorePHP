<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Posts</h1>
    <a class="btn btn-success" href="index.php?action=create">Create Post</a>
</div>

<?php if (empty($posts)): ?>
    <div class="alert alert-info">No posts yet.</div>
<?php else: ?>
    <div class="row g-3">
        <?php foreach ($posts as $p): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="index.php?action=show&id=<?php echo $p['id']; ?>"><?php echo htmlspecialchars($p['title']); ?></a>
                        </h5>
                        <h6 class="card-subtitle text-muted mb-2"><?php echo htmlspecialchars($p['created_at']); ?></h6>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars(strlen($p['body'])>300?substr($p['body'],0,300).'...':$p['body'])); ?></p>
                        <a class="btn btn-sm btn-primary" href="index.php?action=show&id=<?php echo $p['id']; ?>">View</a>
                        <a class="btn btn-sm btn-outline-secondary" href="index.php?action=edit&id=<?php echo $p['id']; ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="index.php?action=delete&id=<?php echo $p['id']; ?>" onclick="return confirm('Delete this post?')">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>