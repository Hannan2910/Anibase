<?php
 require_once 'function.php';
session_start();
$name=$_SESSION['uName'];
echo $name;
$id=$_GET['ad'];
echo $id;
$conn=mysqli_connect("localhost:3306","root","","anibase");
inwa($conn,$id,$name);
/*header("location: ./anime.php");
exit();*/
?>
