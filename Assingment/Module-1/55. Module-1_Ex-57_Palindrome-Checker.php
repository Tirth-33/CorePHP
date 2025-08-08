<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            padding: 30px;
        }
        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e2e3e5;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Palindrome Checker</h2>
        <form method="post">
            <label for="text">Enter a string:</label>
            <input type="text" name="text" id="text" required>
            <input type="submit" value="Check">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST["text"];

            function isPalindrome($str) {
                $cleaned = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
                return $cleaned === strrev($cleaned);
            }

            $result = isPalindrome($input);
            echo "<div class='result'>";
            echo "<strong>Input:</strong> " . htmlspecialchars($input) . "<br>";
            echo "<strong>Result:</strong> " . ($result ? "✅ It's a palindrome!" : "❌ Not a palindrome.");
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>