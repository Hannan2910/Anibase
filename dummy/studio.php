
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
        $res=$conn->query("select DISTINCT(producer.P_id),producer.P_name from producer,producer_of_anime where producer.P_id=producer_of_anime.P_id and producer_of_anime.work='Studio'");
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
      <div class="nav-link ">
        <a href="genre.php">Genre</a>
      </div>
      <div class="nav-link active-nav-link">
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
        <th>NO.</th>
        <th>STUDIO</th>

      </tr>
    </thead>

  <?php
$count=1;
while( $rre=$res->fetch_assoc()):
  ?>
  <tr>
    <td>
      <?php echo $count++ ; ?></td>
    <td>
      <div class="pe">
      <a href="showbypid.php?pid=<?php  echo $rre['P_id']?>"><?php echo $rre['P_name'] ?></a>
      </div>
    </td>

  </tr>
<?php endwhile; ?>
</table>
</div>

</div>
  </body>

</html>
