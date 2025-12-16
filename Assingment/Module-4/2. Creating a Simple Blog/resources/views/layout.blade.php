<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; }
        .btn { padding: 8px 16px; text-decoration: none; background: #007bff; color: white; border-radius: 4px; }
        .btn-danger { background: #dc3545; }
        .form-group { margin-bottom: 15px; }
        input, textarea { width: 100%; padding: 8px; }
        .post { border-bottom: 1px solid #eee; padding: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1><a href="index.php">Simple Blog</a></h1>
        <?php echo $content ?? ''; ?>
    </div>
</body>
</html>