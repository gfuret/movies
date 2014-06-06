<?php
    /*
    *  Redirect to movies.php if the user has start the session
    *  Redirect to login.php if the user haven't start session
    *
    */	
  session_start();
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:login.php');
  }else{
	  header('location:movies.php');
  }
?>
