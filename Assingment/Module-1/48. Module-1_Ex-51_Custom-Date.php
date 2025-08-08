<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Custom Date Formats</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f4f8;
      color: #333;
      padding: 40px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #0078D7;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      padding: 10px 0;
      border-bottom: 1px solid #eee;
      font-size: 18px;
    }

    li strong {
      color: #0078D7;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🗓️ Current Date in Different Formats</h2>
    <ul>
      <?php
        date_default_timezone_set("Asia/Kolkata"); // Set your timezone
        $currentDate = time();

        echo "<li><strong>Y-m-d:</strong> " . date("Y-m-d", $currentDate) . "</li>";
        echo "<li><strong>d/m/Y:</strong> " . date("d/m/Y", $currentDate) . "</li>";
        echo "<li><strong>l:</strong> " . date("l", $currentDate) . "</li>";
        echo "<li><strong>F jS Y:</strong> " . date("F jS Y", $currentDate) . "</li>";
        echo "<li><strong>D, M j Y:</strong> " . date("D, M j Y", $currentDate) . "</li>";
        echo "<li><strong>r (RFC 2822):</strong> " . date("r", $currentDate) . "</li>";
        echo "<li><strong>c (ISO 8601):</strong> " . date("c", $currentDate) . "</li>";
      ?>
    </ul>
  </div>
</body>
</html>