<?php
function emptyInputSignUp($name,$password)
 {
   $result;
   if(empty($name) || empty($password) )
   {
    $result=true;
   }
   else {
     $result=false;
   }
   return $result;
 }
 function uidExists($conn,$name)
 {
   $sql = "select * from user where Name=?;";
   $stmt= mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
     header("location: ./signup.php?error=errorStatement");
     exit();
   }
   mysqli_stmt_bind_param($stmt,"s",$name);
   mysqli_stmt_execute($stmt);
   $resultData=mysqli_stmt_get_result($stmt);

   if($row= mysqli_fetch_assoc($resultData)){
     return $row;
   }
   else {
     $result=false;
     return $result;
   }
   mysqli_stmt_close($stmt);
 }
 function createUser($conn,$name,$password)
 {
   $sql = "insert into user (Name,password) values (?,?);";
   $stmt= mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
     header("location: ./signup.php?error=errorStatement");
     exit();
   }
   mysqli_stmt_bind_param($stmt,"ss",$name,$password);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ./signup.php?error=errorNone");
   exit();
 }
 function loginUser($conn,$username,$pwd){
   $uidExist= uidExists($conn, $username);


   if($uidExist === false)
   {
     header("location: ./Signin.php?error=wrongInput");
     exit();
   }
   $datpass=$uidExist["password"];
   $checkPwd= strcmp($pwd,$datpass);

   if($checkPwd !== 0)
   {
     header("location: ./Signin.php?error=wrongInput");
     exit();
   }
   else if($checkPwd === 0){
     session_start();
     $_SESSION["uName"]=$uidExist["Name"];
     $_SESSION["userStatus"]=$uidExist["status"];
     header("location: ./index.php");
     exit();
   }
 }
function inlists($conn,$id,$name){
  if(inwatched($conn,$id,$name) || planwatch($conn,$id,$name)||dropped($conn,$id,$name)||watching($conn,$id,$name) )
  {
    $il= true;
  }
  else{
    $il=false;
  }
  return $il;
}
function inwatched($conn,$id,$name){
  $sql="select A_id from watched_anime where A_id=? and Name=?";
  $samt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($samt,$sql)){
    header("location: ./showbyaid.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($samt,"ss",$id,$name);
  mysqli_stmt_execute($samt);
  $resultData=mysqli_stmt_get_result($samt);

  if($row= mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($samt);
}

function planwatch($conn,$id,$name){
  $sql="select * from plan_to_watch where A_id=? and Name=?";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showbyaid.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  $resultData=mysqli_stmt_get_result($stmt);

  if($row= mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
function dropped($conn,$id,$name){
  $sql="select * from dropped_anime where A_id=? and Name=?";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showbyaid.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  $resultData=mysqli_stmt_get_result($stmt);

  if($row= mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
function watching($conn,$id,$name){
  $sql="select * from anime_watching where A_id=? and Name=?";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showbyaid.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  $resultData=mysqli_stmt_get_result($stmt);

  if($row= mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
function inptw($conn,$id,$name)
{
  $sql = "insert into plan_to_watch (A_id,name) values (?,?);";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./anime.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./anime.php?error=errorNone");
  exit();
}
function inw($conn,$id,$name,$score)
{
  $sql = "insert into watched_anime (A_id,name,score) values (?,?,?);";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./anime.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"sss",$id,$name,$score);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./anime.php?error=errorNone");
  exit();
}
function inwa($conn,$id,$name)
{
  $sql = "insert into anime_watching (A_id,name) values (?,?);";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./anime.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./anime.php?error=errorNone");
  exit();
}
function indr($conn,$id,$name,$score)
{
  $sql = "insert into dropped_anime (A_id,name,score) values (?,?,?);";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./anime.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"sss",$id,$name,$score);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./anime.php?error=errorNone");
  exit();
}
function delptw($conn,$id,$name)
{
  $sql = "delete from plan_to_watch where A_id=? and Name=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showptw.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./showptw.php?error=errorNone");
  exit();
}
function delwing($conn,$id,$name)
{
  $sql = "delete from anime_watching where A_id=? and Name=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showwing.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./showwing.php?error=errorNone");
  exit();
}
function deldr($conn,$id,$name)
{
  $sql = "delete from dropped_anime where A_id=? and Name=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showdr.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./showdr.php?error=errorNone");
  exit();
}
function delwa($conn,$id,$name)
{
  $sql = "delete from watched_anime where A_id=? and Name=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./showwa.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$id,$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./showwa.php?error=errorNone");
  exit();
}
function deluser($conn,$name)
{
  $sql = "delete from user where Name=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ./users.php?error=errorStatement");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ./users.php?error=errorNone");
  exit();
}
 ?>
