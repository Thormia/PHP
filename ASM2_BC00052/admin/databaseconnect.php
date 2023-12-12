<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ASM2bc00052";

    $conn = mysqli_connect($host,$username,$password,$database);

    if ($conn->connect_error)
    {
        die("connect fail TwT".$conn->connect_error);
    }
    else
       // echo "WELCOME TO DATABASE OwO !!!";
?>