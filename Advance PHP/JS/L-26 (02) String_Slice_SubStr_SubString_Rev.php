<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slice-SubStr-SubString</title>
</head>
<body>
<script>
    str = "My Name is Hardi Tirthbhai Chauhan";

    document.write(str + "<hr>");

    document.write("<h3>Slice</h3>");
    document.write(str.slice(10) + "<br>");
    document.write(str.slice(10,16) + "<br>");
    document.write(str.slice(-17) + "<hr>");

    document.write("<h3>SubStr</h3>");
    document.write(str.substr(10) + "<br>");
    document.write(str.substr(10,16) + "<br>");
    document.write(str.substr(-7) + "<hr>");

    document.write("<h3>Substring</h3>");
    document.write(str.substring(10) + "<br>");
    document.write(str.substring(10,16) + "<br>");
    document.write(str.substring(-7) + "<hr>"); // Not Applicable
</script>    
</body>
</html>