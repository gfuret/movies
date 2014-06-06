<?php
    /*
    *  Handle the request to login to movies.php
    *  Save log in log/session.log if the users can start session 
    *  Vars
    *  $message:        array, save errors of the login process
    *  $uname:          user name value if exists
    *  $password:       user password value if exists
    *  $countError:     error count
    *
    */
    session_start();
    include_once('inc/dbConnect.inc.php');
    include_once('inc/functions.php');
    $message=array();
    //  $uname get the value of the user name if exist if not $message gets a value
    if(isset($_POST['uname']) && !empty($_POST['uname'])){
        $uname=htmlspecialchars((trim($_POST['uname'])));
    }else{
        $message[]='Please enter username';
    }
    //  $password get the value of the user password if exist if not $message gets a value
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password=htmlspecialchars((trim($_POST['password'])));
    }else{
        $message[]='Please enter password';
    }
    // Robot bouncer! this field is supose to stay empty
    if(!empty($_POST['email'])){
        $message[]='There is a problem with your login information, please contact us at a@example.com';
    }
    // check for injections
    foreach ($_POST as $value) {
        if (stripos($value, 'Content-type:') !== FALSE){
            $message[]='There is a problem with your login information, please contact us at a@example.com';
        }
    }
    $countError=count($message);
    //  if $countError is bigger than 0 prints errors and jumps to the end of the file
    if($countError > 0){
         for($i=0;$i<$countError;$i++){
                  echo ucwords($message[$i]);
         }
    }else{
        $res = $db->query("select * from user where uname='$uname' limit 1");
        $checkUser=$res->rowCount();
        $user = $res->fetch(PDO::FETCH_OBJ);
        $checkUser=$res->rowCount();

        if($checkUser > 0){
        // confirms the query was succesful
            if ( crypt($password, $user->hash) == $user->password ) {
            //  confirms the password of the user
                $_SESSION['LOGIN_STATUS']=true;
                $_SESSION['UNAME'] = $user->uname;
                $_SESSION['ID'] = $user->id;
                echo 'correct';
                write_log('id: ' . $user->id . ' User: ' . $user->uname);
            }else{
                echo ucwords('please enter correct user details');
            }
        }else{
            echo ucwords('please enter correct user details');
        }
    }
?>

