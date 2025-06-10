<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>
    <form>
    Name:   <input type="text" onblur="test1(nm)" id="nm">
    <span id = "nmErr"></span><br><br>
    Mobile: <input type="text" onblur="test1(mob)" id="mob">
    <span id = "mobErr"></span><br><br>
    <input type="submit" value="Validate" id="" onclick="return validateForm()">
    </form>
    <script>

        function test1(x)
        {
            console.log(x.value)
        }
        
        let nm_inp = document.getElementById('nm');
        let nm_span = document.getElementById('nmErr');
        // pattern = "[a-zA-Z]+"
        nm_exp = /[a-zA-Z]+/
        let mob_inp = document.getElementById('mob');
        let mob_span = document.getElementById('mobErr');
        console.log (mob_span)
         
        
        function validateForm()
        {
            if (nm_inp.value == "")
            {
                nm_inp.style.border = "2px solid blue"
                nm_span.innerHTML = "Required...!"
                nm_span.style.color = "red"
                // alert ('Name Required...!')
                return false;
            }
            else if(!nm_exp.test(nm_inp.value))
            {
                nm_span.innerHTML = "Letters Only...!"
                nm_span.style.color = "red"
                return false;
            }
             else
            {
                nm_inp.style.border = "2px solid green"
                nm_span.innerHTML = ""
               // alert ('Good Work...!')
            }
            
                
            if (mob_inp.value == "")            
            {
                mob_span.innerHTML = "Required...!"
                mob_span.style.color = "red"
                return false;
                // alert ('Mobile Required...!')
            }
            else
            {
                mob_span.innerHTML = ""
                // alert ('Good Work...!')
            }

        }
    
    </script>
</body>
</html>