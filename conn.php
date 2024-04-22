<?php
$host= "localhost";
$username = "root";
$password="";
$database = "mydb";
$connection = new mysqli($host,$username,$password,$database);
if($connection->connect_error){ die("connection failed".$connection->connect_error); }
?>