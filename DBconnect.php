<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/21/17
 * Time: 8:31 PM
 */

    // connect to mysql db
    $DBconn = mysqli_connect('localhost','root','','loginDB') //establish connection
    or
    die("Error" .mysqli_error($DBconn)); // display error
?>