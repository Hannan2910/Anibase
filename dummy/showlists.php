<?php
$id='';
if(isset($_POST['listadd']))
{$id=$_POST['ad'];}
?>
</<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Lists</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");
        $res=$conn->query("select A_id,A_name,A_score,poster from anime order by A_score desc limit 10");
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
<div class="table">

  <table style="width:100%">
    <thead>
      <tr>
        <th> <a href="showptw.php"> Plan to watch</a>
        </th>
      </tr>
      <tr>
        <th> <a href="showwa.php"> watched</a></th>
      </tr>
      <tr>
        <th> <a href="showdr.php"> Dropped</a></th>
      </tr>
      <tr>
        <th> <a href="showwing.php"> Watching</a></th>
      </tr>
    </thead>
</table>
</div>
</div>
  </body>

</html>
