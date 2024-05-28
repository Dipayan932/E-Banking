
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        table{
            border-collapse: collapse;
            
            width:100%;
        }

        td,th{
            border: 1px solid black;
            padding: 8px;
        }
        .header{
            position: relative;
            left:40%;
        }
        .footer{
            position: relative;
            left:40%;
         
        }

        .table{
            position: relative;
            top:20px;
        }
    </style>
</head>
<body>

<script src="sweet_alart.js"></script>

<script>
swal("Welcome");
</script>


<?php
//input values from the from
$acc_no = $_REQUEST['accno'];
$pin_no = $_REQUEST['pinno'];
session_start();
$_SESSION['accno']=$acc_no;
$_SESSION['pinno']=$pin_no;

//connecting to the database

$servername ="localhost";
$username ="root";
$password ="";
$database="bankingsystem";

//creat a connection

$conn = mysqli_connect($servername, $username, $password, $database);

//if connection not established then die



?>
<div class="header">
    <h3>
    <?php
    $sql2= "select * from account_holder where acc_no = $acc_no and pin_no= $pin_no";
    $result = mysqli_query($conn, $sql2);
    $n=mysqli_num_rows($result);
    //if n>0 then exicute all code bellow
    if($n>0){
        echo "Name: ";
        $row=mysqli_fetch_assoc($result);
        echo $row['name'];
        $_SESSION['username']=$row['name'];
    }
    ?>
    <h3>
</div>
<div class="header">
        <h3>
        
        <?php
            if($n>0){
            $sql3="SELECT SUM(ALL mdeposit) AS total_deposit FROM account_statement WHERE acc_no=$acc_no AND statement=\"Deposit\"";
            $sql4="SELECT SUM(ALL mdeposit) AS total_withdraw FROM account_statement WHERE acc_no=$acc_no AND statement=\"Withdraw\"";
            $result3=mysqli_query($conn ,$sql3);
            $sum=mysqli_fetch_assoc($result3);
            $result4=mysqli_query($conn ,$sql4);
            $sum2=mysqli_fetch_assoc($result4);
            $balance=$sum['total_deposit']-$sum2['total_withdraw'];
            if($result3=mysqli_query($conn ,$sql3)){
            echo "Balance : ";
            echo $balance;
            }else{


            }

        }
        ?>
        <h3>
</div>
<div class="footer">
    <?php

    if($n>0){
    echo "
    <button type=\"button\" class=\"btn btn-success\"
    onclick=\"window.location.href = 'deposit.html'\">Deposit
</button>
    <button type=\"button\" class=\"btn btn-success\"
    onclick=\"window.location.href = 'withdraw.html'\">Withdraw</button>

    <button type=\"button\" class=\"btn btn-success\"
    onclick=\"window.location.href = 'index.html'\">Logout</button>

    ";
    }
    ?>
</div>
<div class="table">

    <table>
    <?php
    if($n>0){
        echo "
        <tr>
            <th>Date</th>
            <th>Statement</th>
            <th>Transaction</th>
        </tr>
        ";
        
        
            if(!$conn){
                die("sorry we failed to connect".mysql_connect_error());
            
            }
            
            $sql1= "select * from account_statement where acc_no = $acc_no and pin_no= $pin_no";
            $result = mysqli_query($conn, $sql1);
            
            while($namer=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$namer['date']."</td>";
                echo "<td>".$namer['statement']."</td>";
                echo "<td>".$namer['mdeposit']."</td>";
               
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>



</body>
</html>
