<?php
$str = [98,76,5];

echo sizeof($str)."<hr>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String</title>
</head>
<body>
<script>
    /* Escape Sequences
    1. /n
    2. /t
    3. /v
    4. /f
    5. /"
    6. /'
    */

   str = "abc efg hij 'kl' mno";
   document.write(str + "<hr>");
   str1 = 'pqr stu vwx "yz"';
   document.write(str1 + "<hr>");
   str2 = "ABC DE FGH \"IJ\" KLM";
   document.write(str2 + "<hr>");
   str3 = "AbC DEF aBc def abC DeF";
   document.write(str3 + "<hr>");
   document.write(str3.replace(/abc/i,"Hardi") + "<hr>");
   document.write(str3.replace(/abc/ig,"Hardi") + "<hr>");
</script>    
</body>
</html>