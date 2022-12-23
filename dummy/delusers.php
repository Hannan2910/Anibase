<?php
 require_once 'function.php';
session_start();
$name=$_POST['uname'];
echo $name;
$conn=mysqli_connect("localhost:3306","root","","anibase");
deluser($conn,$name);
/*header("location: ./anime.php");
exit();*/
?>
