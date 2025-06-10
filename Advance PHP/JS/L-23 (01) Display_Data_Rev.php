<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display-Data</title>
</head>
<body>
    <h1 id="i1" class="c1">Welcome to Tops Technologies</h1>
    <h2 id="i2" class="c2">C.G.Road Branch</h2>

    <a href="Hardi"></a>
    <input type="text">
    <script>
        document.write("New Location of Tops is Near Parimal Garden...!<br><br>")
        
        document.write("<b> Priority@123 </b> This is Password <br><hr>");

        document.write("Text Number Symbols and Tags");

        console.log("This is Console...!");
        
        console.log(document.querySelector('h1'));

        console.log(document.getElementById('i1'));

        console.log(document.querySelector('#i2'));

        console.log(document.querySelector('.c2'));

        document.querySelector('h1').innerHTML = "Overwrite upon <u> Welcome to Tops Technologies </u>"; 

        document.getElementById('i1').innerText = "Overwrite upon <b>Line 31</b>";

        document.querySelector('#i2').innerHTML = "Overwrite upon <u> C.G.Road Branch </u>";
        
        document.querySelector('.c2').innerText = "Overwrite upon <u> Line 35 </u>";

        document.querySelector('a').innerHTML = "This is Hyperlink";

        document.querySelector('input').value = "Hardi T.Chauhan";

        document.querySelector('a').href = "This is Hyperlink-1" // Output Not Showing, What is the Reason?
        
        </script>
</body>
</html>