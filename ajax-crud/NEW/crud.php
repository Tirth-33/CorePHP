<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ajax_crud";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("DB connection failed:" . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS users1(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR (100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
");



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    $action = $_POST['action'];

    if ($action === 'create') {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $sql = "INSERT INTO users1 (name,email) VALUES ('$name','$email')";
        $res = $conn->query($sql);
        echo json_encode(['success' => $res, 'id' => $conn->insert_id]);
        exit;
    }

    if ($action === 'read') {
        $res = $conn->query("SELECT * FROM users1 ORDER BY id DESC");
        $rows = [];
        while ($r = $res->fetch_assoc())
            $rows[] = $r;
        echo json_encode(['success' => true, 'data' => $rows]);
        exit;
    }

    if ($action === 'get') {
        $id = (int) $_POST['id'];
        $res = $conn->query("SELECT * FROM users1 WHERE id = $id");
        echo json_encode(['success' => $res->num_rows > 0, 'data' => $res->fetch_assoc()]);
        exit;
    }

    if ($action === 'update') {
        $id = (int) $_POST['id'];
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $sql = "UPDATE users1 SET name='$name', email='$email' WHERE id=$id";
        $res = $conn->query($sql);
        echo json_encode(['success' => $res]);
        exit;
    }

    if ($action === 'delete') {
        $id = (int) $_POST['id'];
        $res = $conn->query("DELETE from users1 where id=$id");
        echo json_encode(['success' => $res]);
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax-CRUD</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px auto;
            max-width: 800px;
        }

        form {
            margin-bottom: 15px;
        }

        input,
        button {
            padding: 6px;
            margin: 2px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
        }

        th {
            background: #eee;
        }

        button {
            cursor: pointer;
        }

        .danger {
            background: red;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Simple Ajax-CRUD</h2>
    <form action="" id="users1form">
        <input type="hidden" name="" id="id">
        <input type="text" name="name" id="name" placeholder="Name" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <button type="submit" id="SaveBtn">Add</button>
        <button type="button" id="CancelBtn" style="display:none">Cancel</button>
    </form>

    <div id="msg"></div>

    <table id="users1Table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        $(function () {
            const apiUrl = "";

            function msg(t, ok = true) {
                $("#msg").text(t).css("color", ok ? "green" : "red");
            }

            function load() {
                $.ajax({
                    url: apiUrl,
                    type: "POST",
                    dataType: "json",
                    data:
                    {
                        action: "read"
                    },
                    success: function (r) {
                        if (!r.success) {
                            msg("Failed", false);
                            return;
                        }
                        let rows = "";
                        if (r.data.length === 0) {
                            rows = "<tr><td colspan=5>No Records</td></tr>";
                        }
                        r.data.forEach(function (it) {
                            rows += `<tr>
                            <td>${it.id}</td>
                            <td>${it.name}</td>
                            <td>${it.email}</td>
                            <td>${it.created_at}</td>
                            <td>
                                <button onclick="edit(${it.id})">Edit</button>
                                <button class="danger"onclick="del(${it.id})">Del</button>
                            </td>
                            </tr>`;
                        });
                        $("#users1Table tbody").html(rows);
                    },
                    error: function () {
                        msg("AJAX error", false);
                    }
                });
            }

        $("#users1form").submit(function (e) {
            e.preventDefault();
            let id = $("#id").val(),
                name = $("#name").val(),
                email = $("#email").val();
            let action = id ? "update" : "create";
            $.ajax({
                url: apiUrl,
                type: "POST",
                dataType: "json",
                data: {
                    action, id, name, email
                },
                success: function (r) {
                    if (r.success) {
                        msg(action === "create" ? "Added" : "Updated");
                        reset();
                        load();
                    }
                    else msg("Failed", false);
                },
                error: function () {
                    msg("AJAX Error", false);
                }
            });
        });

        $("#CancelBtn").click(reset);

        window.edit = function (id) {
            $.ajax({
                url: apiUrl,
                type: "POST",
                dataType: "json",
                data: {
                    action: "get", id
                },
                success: function (r) {
                    if (r.success) {
                        $("#id").val(r.data.id);
                        $("#name").val(r.data.name);
                        $("#email").val(r.data.email);
                        $("#SaveBtn").text("Update");
                        $("#CancelBtn").show();
                    }
                }
            });
        }

        window.del = function (id) {
                if (!confirm("Delete Record " + id + "?"))
                return;
            $.ajax({
                url: apiUrl,
                type: "POST",
                dataType: "json",
                data: {
                    action: "delete", id
                },
                success: function (r) {
                    if (r.success) {
                        msg("Deleted");
                        load();
                    }
                }

            });
        }

        function reset() {
            $("#id").val("");
            $("#name").val("");
            $("#email").val("");
            $("#SaveBtn").text("Add");
            $("#CancelBtn").hide();
        }
        load();
    });
    </script>
</body>

</html>