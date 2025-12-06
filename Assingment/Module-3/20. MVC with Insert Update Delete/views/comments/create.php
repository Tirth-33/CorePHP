<!DOCTYPE html>
<html>
<head>
    <title>Add New Comment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background: #f8f9fa; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; }
        .form-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-card h1 { color: #333; margin-bottom: 20px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #333; font-weight: 500; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; }
        .form-group textarea { height: 120px; resize: vertical; }
        .form-actions { display: flex; gap: 10px; justify-content: center; margin-top: 30px; }
        .btn { padding: 12px 25px; border: none; border-radius: 6px; text-decoration: none; font-size: 16px; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; }
        .btn-primary:hover { background: #0056b3; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #545b62; }
        .alert { padding: 15px; border-radius: 6px; margin-bottom: 20px; }
        .alert-error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .error-list { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <h1>💬 Add New Comment</h1>

            <?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-error">
                    <strong>Please fix the following errors:</strong>
                    <ul class="error-list">
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <form method="POST" action="index.php?action=store">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" 
                           value="<?php echo htmlspecialchars($_SESSION['old']['name'] ?? ''); ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" 
                           value="<?php echo htmlspecialchars($_SESSION['old']['email'] ?? ''); ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="comment">Comment *</label>
                    <textarea id="comment" name="comment" 
                              placeholder="Write your comment here..." 
                              required><?php echo htmlspecialchars($_SESSION['old']['comment'] ?? ''); ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save Comment</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <?php unset($_SESSION['old']); ?>
</body>
</html>