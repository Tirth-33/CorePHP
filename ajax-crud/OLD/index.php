<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax-Crud</title>
    
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tabledata">
            
        </tbody>
    </table>
    <form action="" id="userform">
        <label for="">Name: </label>
        <input type="text" name="name" id="name">
        <label for="">Email</label>
        <input type="text" name="email" id="email">
        <button type="submit" id="submitbtn">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        // $('#userform').submit(function () {
        //    alert("Nirav Sir Khijaya");
            
        // });
        $('#submitbtn').click(function (x) {
        //    alert("Nirav Sir Khijaya");
            x.preventDefault()
            formdata = $('#userform').serialize()
            // console.log (formdata);
            
            $.ajax({
                url:"create.php",
                method:'post',
                data:formdata,
                success:function(y){
                    console.log(y);
                }

            })
        });
            // $(document).ready(function(){
            //     $(document).on('click',function(){
            //         alert("Nirav Sir Khijaya");
            // });
            // })
    </script>
</body>
</html>