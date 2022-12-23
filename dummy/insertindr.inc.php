<?php
 require_once 'function.php';
session_start();
$name=$_SESSION['uName'];

$id=$_GET['ad'];

/*header("location: ./anime.php");
exit();*/
?>

</<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");

   ?>
  <body>
<div class="container">
  <div class="nav-bar">
    <div class="left-side">
      <div class="nav-link">
          <a href="index.php">Home</a>
      </div>
      <div class="nav-link">
        <a href="about.html">About</a>
      </div>
      <div class="nav-link">
        <a href="search.php">Search</a>
      </div>
      <div class="nav-link">
        <a href="anime.php">Anime</a>
      </div>
      <div class="nav-link">
        <a href="genre.php">Genre</a>
      </div>
      <div class="nav-link">
        <a href="studio.php">Studio</a>
      </div>
      <div class="nav-link">
        <a href="Signin.php">Account</a>
      </div>
    </div>
    <div class="right-side">
      <div class="Name">
        <div >
          ANIBASE
        </div>
      </div>
    </div>
  </div>
<div class="sc">
  <form class="" action="insertindr.php" method="post">
    <label for="uname"><b>Score</b></label>
    <input type="text" placeholder="Enter Score" name='score' required>
    <input type="hidden" name='ad' value=<?php echo $id; ?>>
    <button type="submit" name='sco'>Submit</button>
  </form>
</div>

</div>
  </body>

</html>
