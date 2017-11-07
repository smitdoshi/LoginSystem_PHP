<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/23/17
 * Time: 12:45 AM
 */
session_start();
include "DBconnect.php";


// error validation true or false
$error = false;
// check if form is submitted
if(isset($_POST['signup'])){
    $username_reg = mysqli_real_escape_string($DBconn,$_POST['regusername']);
    $password_reg = mysqli_real_escape_string($DBconn,$_POST['regpwd']);
    $confirmpassword_reg = mysqli_real_escape_string($DBconn,$_POST['confirmregpwd']);

    if (!preg_match("/^[a-zA-Z ]+$/",$username_reg)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

    if(strlen($password_reg) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password_reg != $confirmpassword_reg) {
        $error = true;
        $confirmpassword_error = "Password and Confirm Password doesn't match";
    }

    //If there is no error then only insert into db
    if(!$error){
        if(mysqli_query($DBconn,"INSERT INTO login (username,password) VALUES ('".$username_reg."','".$password_reg."')")){
            $successmsg = "Successfully Registered!";
            // Set the Session varialbe to true and redirect it to the homepage
            $_SESSION['login_usr'] = $username_reg;
            header("location:home.php");
        }
    }else{
        $errormsg = "Error in registering.";
    }
}
?>

<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css"></link>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html>
<head>
    <title>
        Registration Page
    </title>
</head>
<body>
<h1 class="center-align">Register Page</h1>
<div class = "container">
    <form class = "form-signin" method = "post" action="">
        <h4 class = "form-signin-heading"></h4><br>
        <h2><span class="label label-info">Username</span></h2>
        <input type = "text" class = "form-control"
               name = "regusername" placeholder = "username" autofocus>
        <br>
        <h2><span class="label label-info">Password</span></h2>
        <input type = "text" class = "form-control"
               name = "regpwd" placeholder = "Password"><br>
        <h2><span class="label label-info">Confirm Password</span></h2>
        <input type = "text" class = "form-control"
               name = "confirmregpwd" placeholder = "Confirm Password"><br>
        <input class = "btn btn-lg btn-primary btn-block" type = "submit"
               value="Signup" name = "signup"/><br>

        <?php if((isset($error))&&(isset($_POST["signup"]))){
            echo "
                        <div class=\"alert alert-danger\">".$errormsg."
                        <br>
                    ";
        } ?>
    </form>

</div>

</body>
</html>