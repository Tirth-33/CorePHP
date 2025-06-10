<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Object</title>
</head>
<body>
    <!--
    Already Learn in Past:
    1. Conditional Statments
        - if
        - if else
        - if else if
        - nested if
        - switch
    2. Loops
        - for
        - while
        - do while
    -->
<script>
    let x = [1,23,456,7890]
    x1 = [1,2,"Hi",[34,true,{c:[5,6,{d:[78,true]}]}]];

    const objAssoArr = {a:1, "Name":"Hardi"} // Output-1
    document.write(objAssoArr['a'] + "<br>");
    document.write(objAssoArr['Name'] + "<hr>");

    // 1. array.forEach(function);
        
        x.forEach(test);

        function test(a,b)
        {
            document.write(b + "=>" + a + "<br>") // Output-2
        }
        document.write("<hr>")

    // Second Type of array.forEach
        
        x.forEach(function Test1(c,d)
        {
            document.write(d + "=>" + c + "<br>") // Output-3
        })
        document.write("<hr>")

    // Third Type of array.forEach
        
        x.forEach((e,f) =>
        {
            document.write(f + "=>" + e + "<br>") // Output-4
        })
        document.write("<hr>")

        document.write("Array Size = " + x.length + "<hr>"); // Output-5

        document.write(x + "<hr>"); // Output-6

        console.log(x)

        for(index in x)
        {
            document.write(index + "<br>") // Output-7
        }
        document.write("<hr>")

        for(index in x)
        {
            document.write(x[index] + "<br>") // Output-8
        }
        document.write("<hr>")

        for(val of x)
        {
            document.write(val + "<br>") // Output-9
        }
        document.write("<hr>")

        for(i=0; i<x.length; i++)
        {
            document.write(x[i] + "<br>") // Output-10
        } 
        document.write("<hr>")

        y=0;
        while(y < x.length)
        {
            document.write(x[y] + "<br>") // Output-11
            y++;    
        }
        document.write("<hr>")

        z=0;
        do
        {
            document.write(x[z] + "<br>") // Output-12
            z++;
        } while(z < x.length)

</script>
</body>
</html>