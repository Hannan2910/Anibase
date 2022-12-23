<?php session_start();
$name=$_SESSION['uName'];
 ?>
</<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anime Watching</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");
        $res=$conn->query("select anime_watching.A_id,A_name,A_score,poster from anime,anime_watching where anime.A_id=anime_watching.A_id and anime_watching.Name='$name' order by A_score desc");
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
        <th>RANK</th>
        <th>ANIME</th>
        <th>SCORE</th>
      </tr>
    </thead>

  <?php
  $count=1;
while( $row=$res->fetch_assoc()):
  ?>
  <tr>
    <td><?php echo $count++; ?></td>
    <td> <div class="animg">
      <div class="an">
      <a href="showbyaid.php?id=<?php echo $row['A_id'] ?>"><?php echo $row['A_name'] ?></a>
      <form class='list-button' action='delwing.php' method='post'>
        <input type='hidden' name='ad' value= <?php echo $row['A_id'] ?>>
        <button type='submit'name='listadd'>Delete From List</button>
      </form>
      </div>
      <div class="img">
        <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row['poster'] ).'"/>'?>
      </div>

    </div>

      </td>
    <td><?php echo $row['A_score'] ?></td>
  </tr>
<?php endwhile; ?>
</table>
</div>

</div>
  </body>

</html>
