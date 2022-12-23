<?php session_start();
 $id=$_GET['id']; ?>
 <?php require_once 'function.php'; ?>
</<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anime</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase");
        $res=$conn->query("select * from anime where A_id=$id");
        $gen=$conn->query("select G_name from genre,genre_of_anime where genre_of_anime.G_id=genre.G_id and A_id=$id");
        $pro=$conn->query("select P_name from producer,producer_of_anime where producer_of_anime.P_id=producer.P_id and A_id=$id and work='Producer'");
        $stu=$conn->query("select P_name from producer,producer_of_anime where producer_of_anime.P_id=producer.P_id and A_id=$id and work='Studio'");
        $lic=$conn->query("select P_name from producer,producer_of_anime where producer_of_anime.P_id=producer.P_id and A_id=$id and work='Licensor'");
        $dufud=$conn->query("select C_name,C_image,role,V_name,V_image from characters,characters_of_anime,voice_actors where characters_of_anime.C_id=characters.C_id and characters_of_anime.V_id=voice_actors.V_id and A_id=$id");
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
      <div class="nav-link active-nav-link">
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
    <?php $goal=$res->fetch_assoc() ?>
    <div class="right-side">
      <div class="Name">
        <div >
          ANIBASE
        </div>
      </div>
    </div>
  </div>

  <div class="page-content">
    <div class="two-column-wrapper">
      <div class="prof-image">
        <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $goal['poster'] ).'"/>'?>
      </div>
      <div class="profile-content-wrapper">
        <h1><?php echo $goal['A_name'] ?></h1>
        <div class="Score">
          Score:<?php echo $goal['A_score'] ?>
        </div>

        <div class="Genre">
          <table style="table{
            border: none;
            border-style: none;
            }">
            <?php $do=1;  ?>
            <tr>
              <th>Genre:</th>
              <th><?php while( $gre=$gen->fetch_assoc()): ?>
                <?php if($do!=1){
                  echo ", ";

                }
                $do++; ?>
              <?php echo $gre['G_name'] ," ";?>
              <?php endwhile; ?></th>
            </tr>
            <?php $do=1; ?>
            <tr>
              <th>Producer</th>
              <th><?php while( $duc=$pro->fetch_assoc()): ?>
                <?php if($do!=1){
                  echo ", ";

                }
                $do++; ?>
              <?php echo $duc['P_name'] ?>
              <?php endwhile; ?></th>
            </tr>
            <?php $do=1; ?>
            <tr>
              <th>Studio</th>
              <th>
                <?php while( $dio=$stu->fetch_assoc()): ?>
                <?php if($do!=1){
                  echo ", ";

                }
                $do++; ?>
              <?php echo $dio['P_name'] ?>
              <?php endwhile; ?></th>
            </tr>
            <?php $do=1; ?>
            <tr>
              <th>Licensor</th>
              <th>
                <?php while( $cen=$lic->fetch_assoc()): ?>
                <?php if($do!=1){
                  echo ", ";

                }
                $do++; ?>
              <?php echo $cen['P_name'] ?>
              <?php endwhile;?></th>
            </tr>
            <tr>
              <th>Premiered</th>
              <th><?php echo $goal['premiered'] ?></th>
            </tr>
            <tr>
              <th>Aired From</th>
              <th><?php echo $goal['start_date'] ?></th>
            </tr>
            <tr>
              <th>Aired To</th>
              <th><?php echo $goal['end_date'] ?></th>
            </tr>

            <tr>
              <th>Rated</th>
              <th><?php echo $goal['rated'] ?></th>
            </tr>
            <tr>
              <th>Source</th>
              <th><?php echo $goal['source'] ?></th>
            </tr>
            <tr>
              <th>Status</th>
              <th><?php echo $goal['status'] ?></th>
            </tr>
            <tr>
              <th>Trailer</th>

              <th> <a href="<?php echo $goal['trailer'] ?>">LINK</a>
                </th>
            </tr>

          </table>

        </div>
        <h3>Synopsis:</h3>
        <p><?php echo $goal['synopsis'] ?></p>
      </div>

    </div>
<?php if(isset($_SESSION["uName"]))
{$name=$_SESSION["uName"];
  if(inlists($conn,$id,$name)==false){
echo "<form class='list-button' action='lists.php' method='post'>
  <input type='hidden' name='ad' value=$id>
  <button type='submit'name='listadd'>Add to list</button>
</form>";}
else{
  echo "<div class='msgl'>
    <b>Already in a list</b>
  </div>";
}

}
else{
  echo "<div class='msgl'>
    <b>Login to add to list</b>
  </div>";
} ?>


    <table style="width:100%">
      <thead>
        <tr>
          <th>
            Character
          </th>
          <th>
            Image
          </th>
          <th>Role</th>
          <th>VA</th>
          <th>Image</th>
        </tr>
      </thead>
      <?php
    while( $ara=$dufud->fetch_assoc()):
      ?>
      <tr>
        <td><?php  echo $ara['C_name'] ?></td>
        <td> <div class="cvimg">
          <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $ara['C_image'] ).'"/>'?>
        </div>
        </td>
        <td><?php  echo $ara['role'] ?></td>
        <td><?php  echo $ara['V_name'] ?></td>
        <td> <div class="cvimg">
          <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode( $ara['V_image'] ).'"/>'?>
        </div>
      </td>
      </tr>
      <?php endwhile; ?>
    </table>
      </div>
    </div>
  </body>

</html>
