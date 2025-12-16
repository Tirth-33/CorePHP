<!DOCTYPE html>
<html>
<head>
    <title>Categories - Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; margin: 2px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-danger { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h1>Categories</h1>
    <a href="index.php?action=create" class="btn btn-success">Add New Category</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['id']) ?></td>
                        <td><?= htmlspecialchars($category['name']) ?></td>
                        <td><?= htmlspecialchars($category['description']) ?></td>
                        <td><?= htmlspecialchars($category['created_at']) ?></td>
                        <td>
                            <a href="index.php?action=show&id=<?= $category['id'] ?>" class="btn btn-primary">View</a>
                            <a href="index.php?action=edit&id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php?action=destroy&id=<?= $category['id'] ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No categories found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>