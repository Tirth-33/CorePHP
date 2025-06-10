<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Object</title>
</head>
<body>
<!--
Short Cut Keys:
1. Ctrl+Shift+I = Console
2. F12 = Console
3. Alt+Ctrl+Arrow = Multiple Cursor
 -->
</body>
<script>
    let obj = {"Roll No":101, "Name":"Jayesh", "Course":"Java", Mobile:9525262624};

    document.write(obj["Name"] + "<hr>");
    document.write(obj.Name + "<hr>");
    document.write(obj + "<hr>");
    console.log(obj);

    for (index in obj)
    {
        document.write(index + "<br>")    
    }
    document.write("<hr>")

    document.write(obj["Roll No"] + "<br>")
    document.write(obj["Name"] + "<br>")
    document.write(obj["Course"] + "<br>")
    document.write(obj["Mobile"] + "<br><hr>")

    let arr = [15,24,13];

    arr.forEach((v,k,a) =>
    {
        document.write(k + "=>" + v + "<br>")
    });
    </script>
</html>