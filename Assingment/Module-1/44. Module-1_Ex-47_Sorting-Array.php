<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array Sorting Functions</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }
        h2 {
            color: #333;
        }
        pre {
            background: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h2>🔢 sort() - Indexed Array Ascending</h2>
<pre>
<?php
$numbers = [4, 2, 8, 1, 5];
sort($numbers);
print_r($numbers);
?>
</pre>

<h2>🔻 rsort() - Indexed Array Descending</h2>
<pre>
<?php
$numbers = [4, 2, 8, 1, 5];
rsort($numbers);
print_r($numbers);
?>
</pre>

<h2>📊 asort() - Associative Array by Value</h2>
<pre>
<?php
$grades = ["Tirth" => 85, "Divyesh" => 92, "Drasti" => 78];
asort($grades);
print_r($grades);
?>
</pre>

<h2>🔠 ksort() - Associative Array by Key</h2>
<pre>
<?php
$grades = ["Drasti" => 78, "Divyesh" => 92, "Tirth" => 85];
ksort($grades);
print_r($grades);
?>
</pre>

</body>
</html>