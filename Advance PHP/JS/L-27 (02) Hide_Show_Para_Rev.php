<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hide Para</title>
</head>
<body>
    <p id="p1">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus esse ducimus sunt eius praesentium nulla ipsum. Odio vel nisi earum sed illo. Ratione sint illo, at provident enim pariatur a!
    </p>
    <button onclick = "hidePara()">Hide Para</button>
    <script>
        p = document.getElementById('p1')

        function hidePara()
        {
            if(p.style.display == "none")
        {
            p.style.display = "block"
        }
        else
        {
            p.style.display = "none"
        }
        }
    </script>
</body>
</html>