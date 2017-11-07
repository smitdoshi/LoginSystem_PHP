<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/22/17
 * Time: 11:58 PM
 */

// This is a session file
include('DBconnect.php');

session_start();

$user_check = $_SESSION['login_usr'];
// query to get the username
$ses_sql = mysqli_query($DBconn,"select username from login WHERE username = '$user_check'");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

// If the session is not SET
if(!isset($_SESSION['login_usr'])){
    header("location: index.php");
}

?>

