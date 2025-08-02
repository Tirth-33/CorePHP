<!-- get_form.php -->
<!DOCTYPE html>
<html>
<head><title>GET-POST Method Example</title></head>
<body>
    <h2>GET Method</h2>
    <form method="get" action="30. Module-1_Ex-33_Get_Post.php">
        Name: <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['name'])) {
        echo "Hello, " . htmlspecialchars($_GET['name']) . "!<br>";
        echo "Data received via GET.<br>";
        echo "🔍 URL: " . $_SERVER['REQUEST_URI'];
    }
    ?>

    <h2>POST Method</h2>
    <form method="post" action="30. Module-1_Ex-33_Get_Post.php">
        Name: <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['name'])) {
        echo "Hello, " . htmlspecialchars($_POST['name']) . "!<br>";
        echo "Data received via POST.<br>";
        echo "🔍 URL: " . $_SERVER['REQUEST_URI'];
    }
    ?>
</body>
</html>