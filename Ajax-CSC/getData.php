<?php

$conn = new mysqli('localhost','root','','csc-ajax-json');

$id=$_POST['id'];
$data = [];


$sql = "select * from state where country_id=1";
$run = $conn->query($sql);

$options = 1;
while($fetch=$run->fetch_object())
{?>

<option value=""><?= $fetch->name ?></option>

<?php
}

header('Content-type:application/josn');

echo json_encode($data);
?>