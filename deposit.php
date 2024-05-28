

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="sweet_alart.js"></script>

<?php
//input values from the from
$today= date("y.m.d");
$statement="Deposit";
$amount= $_REQUEST['amount'];
session_start();
$name=$_SESSION['username'];
$accno = $_SESSION['accno'];
$pinno=$_SESSION['pinno'];

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

$sql= "insert into account_statement ( date ,name, acc_no, pin_no , statement, mdeposit) values('$today' , '$name', '$accno','$pinno','$statement', '$amount')";
if($result = mysqli_query($conn, $sql)){
    echo "
    <script>
    swal({title:\"Deposit Sucssfull\",
        icon:\"success\",
    })
    .then(function(){
        window.location=\"index.html\";
      });
    </script>";
}else{
    echo "no";
}

?>
 
</body>
</html>
