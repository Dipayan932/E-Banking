<?php
//input values from the from
$name = $_REQUEST['name'];
$acc_no = $_REQUEST['accno'];
$pin_no = $_REQUEST['pinno'];

//connecting to the database

$servername ="localhost";
$username ="root";
$password ="";
$database="bankingsystem";

//creat a connection

$conn = mysqli_connect($servername, $username, $password, $database);

//if connection not established then die

if(!$conn){
    die("sorry we failed to connect".mysql_connect_error());

}

$sql= "insert into account_holder ( name , acc_no , pin_no) values('$name' , '$acc_no', '$pin_no')";
$result = mysqli_query($conn, $sql);
echo "name:  ".$name;
echo "<br>Account Number:  ".$acc_no;
echo "<br>Pin Number:  ".$pin_no;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form-group">
        <button type="button" class="btn btn-success"
        onclick="window.location.href = 'index.html'">Login</button>
    </div>
</body>
</html>