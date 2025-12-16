<!DOCTYPE html>
<html>
<head>
    <title>View Category - Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .category-details { background: #f8f9fa; padding: 20px; border-radius: 5px; }
        .detail-row { margin-bottom: 10px; }
        .label { font-weight: bold; }
        .btn { padding: 10px 20px; text-decoration: none; margin: 5px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-danger { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h1>Category Details</h1>
    
    <?php if ($category): ?>
        <div class="category-details">
            <div class="detail-row">
                <span class="label">ID:</span> <?= htmlspecialchars($category['id']) ?>
            </div>
            <div class="detail-row">
                <span class="label">Name:</span> <?= htmlspecialchars($category['name']) ?>
            </div>
            <div class="detail-row">
                <span class="label">Description:</span> <?= htmlspecialchars($category['description']) ?>
            </div>
            <div class="detail-row">
                <span class="label">Created At:</span> <?= htmlspecialchars($category['created_at']) ?>
            </div>
            <div class="detail-row">
                <span class="label">Updated At:</span> <?= htmlspecialchars($category['updated_at']) ?>
            </div>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="index.php?action=edit&id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
            <a href="index.php?action=destroy&id=<?= $category['id'] ?>" 
               class="btn btn-danger" 
               onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
            <a href="index.php?action=index" class="btn btn-secondary">Back to Categories</a>
        </div>
    <?php else: ?>
        <p>Category not found.</p>
        <a href="index.php?action=index" class="btn btn-secondary">Back to Categories</a>
    <?php endif; ?>
</body>
</html>