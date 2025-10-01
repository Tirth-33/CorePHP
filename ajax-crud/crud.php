<?php

$conn = new mysqli('localhost','root','','ajax_crud');

// if($conn)
// {
//     echo "Jay Shree Ram";
// }

if(isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['action']))
{
    header('Content-type:application/json');
    if($_POST['action'] == "create")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "insert into users2(name,email) values('$name','$email')";
        $conn->query($sql);

        
        echo json_encode(['success'=>130991]);
        exit();
    }

    if($_POST['action'] == "read")
    {
        $sql = "select * from users2";
        $run = $conn->query($sql);

        $data = [];
        while($fetch = $run->fetch_object())
        {
            $data[] = $fetch;
        }
        echo json_encode(['fetchdata'=>"success","data"=>$data]);
        exit();
    }

    if($_POST['action'] == "delete")
    {
        $id = $_POST['id'];
        $sql = "delete from users2 where id=$id";
        $run = $conn->query($sql);

        
        echo json_encode(['deleteRecord'=>"success"]);
        exit();
    }

    if($_POST['action'] == "get")
    {
        $id = $_POST['id'];
        $sql = "select * from users2 where id=$id";
        $run = $conn->query($sql);

        // $data = [];
        $fetch = $run->fetch_object();
        
        
        echo json_encode(['success'=>"Single-Record","data"=>$fetch]);
        exit();
    }

    if($_POST['action'] == "update")
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "update users2 set name='$name', email='$email' where id=$id";
        $run = $conn->query($sql);

        // $data = [];
        echo json_encode(['success'=>"Record-Updated"]);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX-CRUD</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" id="userform">
        <div>
            <label for="">ID:</label>
            <input type="text" name="" id="uid" readonly><br><br>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" name="" id="uname"><br><br>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="" id="uemail"><br><br>
        </div>
        <div>
            <input type="submit" name="" id="">
        </div>
    </form>

    <h1>User Data</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        apiUrl = ""
        $('#userform').submit(function(e){
            // alert('How R U...?')
            e.preventDefault();
            let id=$('#uid').val();
            let name=$('#uname').val();
            let email=$('#uemail').val();

            // console.log(id,name,email);

            let action = (id) ? "update" : "create";
            console.log(action);

            $.ajax({
                url:apiUrl,
                type:"POST",
                data:{
                    action,
                    id,
                    name,
                    email
                },
                dataType:"json",
                success:function(res){
                    // console.log(res)
                    fetchData()
                }
            })
        })

        function fetchData()
        {
            $.ajax({
                url:apiUrl,
                type:"POST",
                data:{
                    action:"read"
                },
                dataType:"json",
                success:function(res){
                    // console.log(res)
                    
                    row = "";
                    $.each(res.data,function(k,v){
                        // console.log(v.name,v.id,v.email)

                        row = row + `
                                    <tr>
                                    <td>${v.id}</td>
                                    <td>${v.name}</td>
                                    <td>${v.email}</td>
                                    <td>
                                    <button onclick="editRec(${v.id})">Edit</button>
                                    <button onclick="delRec(${v.id})">Delete</button>
                                    </td>
                                    </tr>`
                    })

                    // console.log(row)
                    $('tbody').html(row)

                }
        })
    }
            
        fetchData()

        function editRec(id)
        {
            $.ajax({
                url:apiUrl,
                type:"POST",
                data:{
                    action:"get",id
                },
                dataType:"json",
                success:function(res){
                    console.log(res.data.name)
                    $("#uid").val(res.data.id)
                    $("#uname").val(res.data.name)
                    $("#uemail").val(res.data.email)
                    fetchData()
                }
            })
        }

        function delRec(id)
        {
            alert("Do You Want Delete Record...?");
            $.ajax({
                url:apiUrl,
                type:"POST",
                data:{
                    action:"delete",id
                },
                dataType:"json",
                success:function(res){
                    console.log(res)
                    fetchData()
                }
            })
        }
    </script>
</body>
</html>