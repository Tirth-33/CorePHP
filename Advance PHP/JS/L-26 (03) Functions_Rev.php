<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>
<style>
    .hardi
    {
        /*animation-name: anm;
        animation-duration: 5s;
        animation-iteration-count: infinite;*/
        animation:anm 5s forwards;
    }

    @keyframes anm 
    {
        from
        {
            background: yellow;
            transform: translate(-200px,0);
        }    
        to
        {
            background: skyblue;
            transform: translate(0px,0px);
        }
    }
</style>
<body>
    <h1></h1>
    <img src="http://localhost/Revision/Advance%20PHP/JS/IMG-20141219-WA0000.jpg" alt="" height="150px"><br><hr>
    <input type="text" name="" id=""><br><br>
    <textarea name="" id="t1"></textarea><hr>
    <button onclick = "getEffect()">Click</button><br><br>
    <button ondblclick = "validate()">Double Click</button><br><br>
    <button onmouseover = "getImage()">Mouse-Over</button><br><br>
    <button onmouseout = "getText()">Mouse-Out</button><br><br>
    <button onmouseenter = "changeImg()">Mouse-Enter</button><br><br>
    <button onmouseleave = "getAlert()">Mouse-Leave</button><br><hr>

    <!--<button>Submit</button><br><br>-->
    
    <p>Gardening is my favourite hobby. I own a small plot of land next to our house. I cultivate gardening there. Every day, I spend half an hour gardening. After returning from my morning walk, I go to my garden with a spade and a bucket of water.</p>

    <button onclick = "hidePara()">Hide/Show Para</button><br><hr>



<script>
    h1_tag = document.querySelector('h1');
    console.log(h1_tag);
    image = document.querySelector('img');
    inp = document.querySelector('input');
    tArea = document.getElementById('t1');
    p = document.querySelector('p');

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

    function getText()
    {
        tArea.textContent = inp.value
    }

    function getAlert()
    {
        alert('Alert')
    }

    function getImage()
    {
        image.src = 'http://localhost/Revision/Advance%20PHP/JS/00.JPG'
    }

    function validate()
    {
        inp.style.border = "2px solid blue"
    }

    function getEffect()
    {
        h1_tag.innerHTML = "Hardi"
        h1_tag.style.color = "Green"
        h1_tag.className = "hardi"
    }

    function changeImg()
    {
        image.src = 'http://localhost/Revision/Advance%20PHP/JS/Image0188.jpg'
    }
    
</script>

</body>
</html>

