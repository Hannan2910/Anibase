<?php
 require_once 'function.php';
session_start();
$name=$_SESSION['uName'];
echo $name;
$id=$_POST['ad'];
echo $id;
$score=$_POST['score'];
echo $score;
$conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");
indr($conn,$id,$name,$score);
/*header("location: ./anime.php");
exit();*/
?>
