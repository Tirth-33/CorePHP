<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get-Text</title>
</head>
<body>
    <!-- <input type="text" onclick="getText()" id="i1">
     <input type="text" onkeypress="getText()" id="i1">
     <input type="text" onkeydown="getText()" id="i1"> -->
    <input type="text" onkeyup="getText()" id="i1">
    <textarea name="" id="t1"></textarea>
    <!-- <button onclick = "getText()">Get-Text</button> -->

    <script>
        inp = document.getElementById('i1')
        txt = document.getElementById('t1')

        function getText()
        {
            txt.innerHTML = inp.value
        }
    </script>
</body>
</html>