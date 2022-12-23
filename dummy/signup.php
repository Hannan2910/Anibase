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
  <?php  session_start();
   if(!isset($_SESSION["uName"]))
          {
            echo "
            <div class='sign-up'>
              <h2>Signup Form</h2>

              <form action='signup.inc.php' method='post'>
                <div class='imgcontainer'>

                </div>

                <div class='container'>
                  <label for='uname'><b>Username</b></label>
                  <input type='text' placeholder='Enter Username' name='uname' >

                  <label for='psw'><b>Password</b></label>
                  <input type='password' placeholder='Enter Password(8 characters minimum)' name='psw'>

                  <button type='submit' name='sub'>Signup</button>

                </div>

                <div class='container' style='background-color:#f1f1f1'>

                </div>
              </form>

            </div>";

            if(isset($_GET['error']))
            {
              if($_GET['error']=='emptyInput'){
                echo 'emptyInput';
              }
              if($_GET['error']=='usernameTaken'){
                echo 'usernameTaken';
              }
              if($_GET['error']=='errorNone'){
                echo 'User Created';
              }

            }
          }
  else{
    $uname=$_SESSION['uName'];
    echo "
    <h2>Welcom $uname </h2>";
    echo"
    <form action='showlists.php' method='post'>
            <button type='submit' name='goli'>LISTS</button>
            </form>";

    echo "<form action='logout.inc.php' method='post'>
            <button type='submit' name='submit'>LOG OUT</button>
            </form>";
            if($_SESSION['uName']=='admin'){
              echo"<form action='admin.php' method='post'>
                      <button type='submit' name='subad'>ADMIN</button>
                      </form>";

            }
  }?>

</div>
  </body>

</html>
