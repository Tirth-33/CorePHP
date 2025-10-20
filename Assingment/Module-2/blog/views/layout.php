<?php
// $view should be set by controller render()
ob_start();
include __DIR__ . '/' . $view;
$content = ob_get_clean();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mini MVC Blog</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mini MVC Blog</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=create">New Post</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <?php echo $content; ?>
</main>

<footer class="text-center text-muted py-4">
    <div class="container">Simple file-based MVC blog — demo only.</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>