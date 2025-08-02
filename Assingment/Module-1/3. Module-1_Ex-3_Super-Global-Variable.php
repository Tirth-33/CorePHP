<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
</head>
<body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name  = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);

        echo "<h2>Submitted Data:</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>