<?php 
  session_start();
  if(isset($_SESSION['id_user'])){
    header("location: users.php");
  }
  else{
    header("location:../site/index.php");//đã fixx
  }
?>

