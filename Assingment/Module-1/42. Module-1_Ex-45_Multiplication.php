<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 500px;
            background: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007BFF;
            color: white;
        }
        td {
            background: #f9f9f9;
        }
        caption {
            caption-side: top;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<table>
    <caption>Multiplication Table (1 to 10)</caption>
    <tr>
        <th>&times;</th>
        <?php
        // Top header row
        for ($i = 1; $i <= 10; $i++) {
            echo "<th>$i</th>";
        }
        ?>
    </tr>

    <?php
    // Table rows
    for ($row = 1; $row <= 10; $row++) {
        echo "<tr>";
        echo "<th>$row</th>"; // Left header column
        for ($col = 1; $col <= 10; $col++) {
            echo "<td>" . ($row * $col) . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>