<?php
 require_once 'function.php';
session_start();
$name=$_SESSION['uName'];
echo $name;
$id=$_POST['ad'];
echo $id;
$conn=mysqli_connect("localhost:3306","root","","anibase");
delwing($conn,$id,$name);
/*header("location: ./anime.php");
exit();*/
?>
