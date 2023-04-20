<?php

$username="root";
$servername="localhost";
$password="";
$database="cinema";

$conn= new mysqli($servername,$username,$password,$database);
 if($conn->connect_error){
    die("connection failed ");
 }


 ?>