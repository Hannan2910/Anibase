
<?php require_once 'function.php'; ?>
</<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>

  <?php $conn=mysqli_connect("localhost:3306","root","","anibase") or die("Connection Failed!!!");

   ?>

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
      <div class="nav-link  active-nav-link" >
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
  <?php if(isset($_POST['sub']))
{
  $name=$_POST['uname'];

  $password=$_POST['psw'];


  if(emptyInputSignUp($name,$password) !==false){
    header("location: ./signup.php?error=emptyInput");
      exit();
  }
  if(uidExists($conn, $name) !==false){
    header("location: ./signup.php?error=usernameTaken");
      exit();
  }
createUser($conn,$name,$password);
}
else {
  header("location: ./signup.php");
  exit();
}

  ?>



</div>
  </body>

</html>
