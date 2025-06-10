<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="c1" id="i1">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis eum perferendis voluptates, modi veniam quia minus autem cumque est ut totam commodi sed ab aliquid quas velit vero unde cum!
    </h1>
    <script>
        $('h1').click(test)
        
        function test()
        {
           // $('h1').hide();
           // $('.c1').hide(); // Threw Class
           // $('#i1').hide(); // Threw Id
           $(this).hide(); // Threw This Keyword
        }

        $(document).dblclick(test)
    </script>
</body>
</html>         