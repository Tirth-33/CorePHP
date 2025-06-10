<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <p id="i1" class="c1">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio odio ab doloremque quae alias perspiciatis eius, voluptates corrupti non in. Non est corporis neque rerum pariatur nulla repellendus nemo dolore?
    </p>

    <button id="H1">Hide</button>
    <button id="S1">Show</button>
    <button id="T1">Toggle</button>

    <script>
        console.log(document.querySelector('p'))
        console.log(document.querySelector('#i1'))
        console.log(document.querySelector('.c1'))
        console.log(document.getElementById('i1'))

        console.log($('p'))
        console.log($('#i1'))
        console.log($('.c1'))

        p1 = $('p')
        p2 = $('#i1')
        p3 = $('.c1')

        $('#H1').click
        
        (
            function hidePara() // Type-1
            {
                p1.hide(1000);
            }
        )
        
        $('#S1').click(showPara) // Type-2

        function showPara()
        {
            p2.show(1500);
        }

        $('#T1').click
        (
            function() // Type-3 (Annonymus Function)
            {
                p3.toggle(500);
            }
        )
        
        /*
        $('#T1').click
        (
            ()=> // Type-4 (Arrow Function)
            {
                p3.toggle();
            }
        )
        */
    </script>
        <!--
        $(selector).method();
        $('element').method()
        $('.class').method()
        $('#id').method()
        $(this).method()
        $(document).method()
        -->
</body>
</html>