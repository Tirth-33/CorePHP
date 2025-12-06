<!DOCTYPE html>
<html>
<head>
    <title>Comment Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: #f8f9fa; }
        .container { max-width: 1000px; margin: 0 auto; padding: 20px; }
        .header { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 30px; }
        .header h1 { color: #333; margin-bottom: 10px; }
        .header p { color: #666; }
        .stats { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .add-btn { background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 6px; text-decoration: none; display: inline-block; }
        .add-btn:hover { background: #218838; }
        .alert { padding: 15px; border-radius: 6px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
        .alert-error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .comments-grid { display: grid; gap: 20px; }
        .comment-card { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .comment-header { display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px; }
        .comment-author { font-weight: bold; color: #333; }
        .comment-email { color: #666; font-size: 14px; }
        .comment-date { color: #999; font-size: 12px; }
        .comment-text { color: #555; line-height: 1.6; margin-bottom: 15px; }
        .comment-actions { display: flex; gap: 10px; }
        .btn { padding: 8px 15px; border: none; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; }
        .btn-edit { background: #007bff; color: white; }
        .btn-edit:hover { background: #0056b3; }
        .btn-delete { background: #dc3545; color: white; }
        .btn-delete:hover { background: #c82333; }
        .no-comments { text-align: center; padding: 50px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💬 Comment Management System</h1>
            <p>Manage user comments with full CRUD operations using MVC architecture</p>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="stats">
            <div>
                <strong>Total Comments: <?php echo $totalComments; ?></strong>
            </div>
            <a href="index.php?action=create" class="add-btn">+ Add New Comment</a>
        </div>

        <div class="comments-grid">
            <?php if (empty($comments)): ?>
                <div class="no-comments">
                    <h3>No comments yet</h3>
                    <p>Be the first to add a comment!</p>
                </div>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-card">
                        <div class="comment-header">
                            <div>
                                <div class="comment-author"><?php echo htmlspecialchars($comment['name']); ?></div>
                                <div class="comment-email"><?php echo htmlspecialchars($comment['email']); ?></div>
                            </div>
                            <div class="comment-date">
                                <?php echo date('M j, Y g:i A', strtotime($comment['created_at'])); ?>
                            </div>
                        </div>
                        
                        <div class="comment-text">
                            <?php echo nl2br(htmlspecialchars($comment['comment'])); ?>
                        </div>
                        
                        <div class="comment-actions">
                            <a href="index.php?action=edit&id=<?php echo $comment['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="index.php?action=delete&id=<?php echo $comment['id']; ?>" 
                               class="btn btn-delete" 
                               onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>