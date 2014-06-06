<?php
    /*
    *  Log out the user and destroy session
    *
    */
  session_start();
  session_destroy();
  header('location:login.php');
?>

