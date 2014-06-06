<?php
    /*
    *  Show list of filtered movies of the user that logins
    *
    *  Vars
    *  $mname:   Filter parameter
    *
    */
	include_once('inc/dbConnect.inc.php');
    //redirect to login if the user havent start session
    session_start();
    if(!isset($_SESSION['LOGIN_STATUS'])){
        header('location:login.php');
    }
	$mname = '';
	if(isset($_POST['mname'])){
	    $mname = htmlspecialchars($_POST['mname']);
	} 
    $res = $db->query("SELECT mname, ryear FROM movies 
    					WHERE ( mname LIKE '%%" . $mname . "%%' 
    					OR ryear LIKE  '%%" . $mname . "%%' ) 
                        AND idu=" . $_SESSION['ID'] . " 
                        ORDER BY id ASC LIMIT 20");

    foreach ($res as $row){
        echo '<li>' . $row['mname'] . ' <span>(' . $row['ryear'] . ')</span></li>';
    }



?>
