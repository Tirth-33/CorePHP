<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable-DataType</title>
</head>
<body>
<script>
    var x = 10; // Declaration
    var x = -10.45; // Re-Declaration
    x = 45; // Re-Assignment Allowed
    
    document.write(x , "<hr>");

    let y = 20; // Declaration
    // let y = -20.50; // Re-Declaration Not Allowed
    y = 120; // Re-Assignment Allowed

    document.write(y , "<hr>");

    const z = 30; // Declaration
    // const z = -30.55; // Re-Declaration Not Allowed
    // z = 325; // Re-Assignment Not Allowed
    
    document.write(z , "<hr>");

    let a = 50;
    let b = "Jay";
    let c = true
    let d = ""
    let e = null
    let f;
    let g = [10,20];
    let h = {i:10,j:15}

    document.write(" 1. " +a + " / " + typeof(a) + "<hr>");
    document.write(" 2. " +b + " / " + typeof(b) + "<hr>");
    document.write(" 3. " +c + " / " + typeof(c) + "<hr>");
    document.write(" 4. " +d + " / " + typeof(d) + "<hr>");
    document.write(" 5. " +e + " / " + typeof(e) + "<hr>");
    document.write(" 6. " +f + " / " + typeof(f) + "<hr>");
    document.write(" 7. " +g + " / " + typeof(g) + "<hr>");
    document.write(" 8. " +h + " / " + typeof(h) + "<hr>");
</script>

</body>
</html>