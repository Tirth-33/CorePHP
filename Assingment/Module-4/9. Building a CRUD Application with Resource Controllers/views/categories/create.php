<!DOCTYPE html>
<html>
<head>
    <title>Add Category - Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; }
        .btn { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-secondary { background: #6c757d; }
    </style>
</head>
<body>
    <h1>Add New Category</h1>
    
    <form method="POST" action="index.php?action=store">
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        
        <button type="submit" class="btn">Create Category</button>
        <a href="index.php?action=index" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>