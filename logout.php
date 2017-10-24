<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/23/17
 * Time: 12:39 AM
 */

session_start();
if(session_destroy()){
    header("location:login.php");
}
?>