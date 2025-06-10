<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set-Time-Out-Interval</title>
</head>
<body>
<script>
    x=1;
    function test()
    {
        if(x<=5)
    {
        document.write("Hello <br>");
        x++;
    }
    }
    // setInterval(test,1000); // setInterval(functionName,timeInMS);
    setInterval("test()", 1500); // setInterval("functionName()",timeInMS);

    function test1()
    {
        document.write("SetTimeOut <br>");
        setTimeout(test1, 1000);
        //setTimeout(functionName,timeInMS);
        //setTimeout("functionName()",timeInMS);
    }
    test1()
</script>
</body>
</html>