<?php

include_once('dbConnect.inc.php');

/*
* write_log($message[, $logfile])
*
* Parameters:
*  $message:   Message to be logged
*  $logfile:   Path of log file to write to.  Optional.  Default is log/session.log.
*
*/
 
function write_log($message, $logfile='log/session.log') {

 
    // Get time of request
	if( ($time = $_SERVER['REQUEST_TIME']) == '') {
		$time = time();
	}
 
    // Get IP address
	if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
		$remote_addr = "REMOTE_ADDR_UNKNOWN";
	}
 
    // Format the date and time
	$date = date("Y-m-d H:i:s", $time);
 
    // Append to the log file
	if($fd = @fopen($logfile, "a")) {
		$result = fputcsv($fd, array($date, $remote_addr, $message));
		fclose($fd);
	}
}

/** ***************************************************************************************** 
* Test to change password to encrypt
*
*/

// $username = 'POST_USER';
// $password = 'POST_PASSWORD';
// $cost = 10;
// $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
// $salt = sprintf("$2a$%02d$", $cost) . $salt;
// $hashed    = crypt($password, $salt);
// $sql = "UPDATE user SET hash=?, password=? WHERE uname=?";
// $q = $db->prepare($sql);
// $q->execute(array($salt,$hashed,$username));

/** ***************************************************************************************** 
* Test to read encrypt password
*
*/

// $sth = $db->prepare(' SELECT hash, password FROM user
//   					WHERE uname = :username LIMIT 1 ');
// $sth->bindParam(':username', $username);
// $sth->execute();
// $user = $sth->fetch(PDO::FETCH_OBJ);
// // Hashing the password with its hash as the salt returns the same hash
// if ( crypt($password, $salt) === $hashed ) {
// 	echo 'Ok!' . '<br>' . $user->password;
// }else{
// 	echo "Not Ok..." . '<br>';
// }
// $user = $sth->fetch(PDO::FETCH_OBJ);
// var_dump($user);

?>