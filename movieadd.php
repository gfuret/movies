<?php
    /*
    *  Add movie to the data base, uses the id of the log user
    *
    *  Vars
    *  $name:   Name of the movie
    *  $year:   Year of the movie
    *  $id:     Id of the logged user
    */
    session_start();
    if(!isset($_SESSION['LOGIN_STATUS'])){
        header('location:login.php');
    }
	include_once('inc/dbConnect.inc.php');

	if(isset($_POST['name']) AND isset($_POST['year'])){
    
        $res = $db->prepare("INSERT INTO movies (mname, ryear, idu) VALUES (?, ?, ?)");
        $res->bindParam(1, $name);
        $res->bindParam(2, $year);
        $res->bindParam(3, $user);
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $user = $_SESSION['ID'];
        $res->execute();
    }
?>
