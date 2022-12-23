
</<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Genre</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");
        $res=$conn->query("select G_id,G_name from genre");
   ?>
  <body>
<div class="container">
  <div class="nav-bar">
    <div class="left-side">
      <div class="nav-link ">
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
      <div class="nav-link active-nav-link">
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
        <th>ID</th>
        <th>GENRE</th>

      </tr>
    </thead>

  <?php

while( $rre=$res->fetch_assoc()):
  ?>
  <tr>
    <td>
      <?php echo $rre['G_id']; ?></td>
    <td>
      <div class="ge">
      <a href="showbygid.php?gid=<?php echo $rre['G_id'] ?>"><?php echo $rre['G_name'] ?></a>
      </div>
    </td>

  </tr>
<?php endwhile; ?>
</table>
</div>

</div>
  </body>

</html>
