<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/18/17
 * Time: 9:25 PM
 */
include"DBconnect.php";
session_start();

$errormsg="";
// ------ Another way of Validation ------------
// username and password sent from form
//if($_SERVER["REQUEST_METHOD"]=="POST")
if(!isset($_POST["regi"])) {

    if ((!empty($_POST["logusername"])) && (!empty($_POST["logpassword"]))) {
        $loginusername = mysqli_real_escape_string($DBconn, $_POST['logusername']);
        $loginpwd = mysqli_real_escape_string($DBconn, $_POST['logpassword']);

        $sql_query = "SELECT id FROM login WHERE username='$loginusername' AND password='$loginpwd'";
        // query to perform
        $result_query = mysqli_query($DBconn, $sql_query);
        // Check the row count
        $row_count = mysqli_num_rows($result_query);

        // If the count ==1 and username and password matches
        if ($row_count == 1) {
            $_SESSION['login_usr'] = $loginusername; //store the login username to the session
            // Check if remember is checked
            if (!empty($_POST["remember"])) {
                setcookie("usr_name", $_POST["logusername"], time() + (1 * 60 * 60 * 24)); // 24hr day
                setcookie("usr_password", $_POST["logpassword"], time() + (1 * 60 * 60 * 24)); // 24 hr password
                // redirect it to homepage
                header("location:home.php");
            } // If not then don't set cookies
            else {
                if (isset($_COOKIE["usr_name"])) {
                    setcookie("usr_name", "");
                }
                if (isset($_COOKIE["usr_password"])) {
                    setcookie("usr_password", "");
                }
            }
        }
        // redirect it to homepage
        header("location:home.php");
    } // If cookies are already set then redirect it to the homepage
    elseif ((isset($_SESSION['login_usr'])) && ($_SESSION['login_usr'] == true)) {
        // redirect it to homepage
        header("location:home.php");
    }
    else {
        $errormsg = "Username or Password is empty";
    }
}
else {
    header("location:registration.php");
}



//// Here we will validate Login Button Pressed and then check with mysql
//    if(isset($_POST['login'])){
//        $username = mysqli_real_escape_string($DBconn,$_POST['username']);
//        $password_check = mysqli_real_escape_string($DBconn,$_POST['password']);
//
//        $sql_query = mysqli_query($DBconn,"SELECT * FROM login WHERE username='$username' and password='$password_check'");
//        //rows
//        $result = mysqli_query($sql_query);
//        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//
//        // count the number of row result. it should be ==1
//        $count = mysqli_num_rows($result_query);
//        //If result matched and return one row then check further validation
//        if($count==1){
//            // If count is one then store the username in the Session as login_usr
//            $_SESSION['login_usr'] = $username;
//            print_r($_SESSION);
//            // Now we will redirect login user to home page
//            //header("location:home.php");
//        }else{
//            $errormsg= "Wrong Username or Password";
//            return false;
//        }
//}

?>

<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css"></link>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>
    <title>
        LoginPage
    </title>
</head>
<body>
<div class = "container">
    <div class="login-box">
        <h2>Login</h2>
        <form class = "form-signin" method = "post" action="">
            <h4 class = "form-signin-heading"></h4>
            <input type = "text" class = "form-control"
                   name = "logusername" placeholder = "username" autofocus
                   value="<?php if(isset($_COOKIE["usr_name"])){echo $_COOKIE["usr_name"];} ?>"> <!-- Check if username cookie is set-->
            <br>
            <input type = "text" class = "form-control"
                   name = "logpassword" placeholder = "password"
                   value="<?php if(isset($_COOKIE["usr_name"])){echo $_COOKIE["usr_password"];} ?>"> <!-- Check if password cookie is set-->
            <br>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember">
                    Remember Me
                </label>
            </div>
            <input class = "btn btn-lg btn-primary btn-block" type = "submit"
                   value="Login" name = "login" id="signIn_button"/><br>
            <input class = "btn btn-lg btn-primary btn-block" type = "submit" value="Signup"
                   name = "regi"/><br>
            <?php if((isset($_POST["login"]))&&(!empty($_POST["logusername"]))){
                echo "
                        
                        <div class=\"alert alert-danger\">".'Wrong Username or Password'."
                        <br>
                    ";
            }elseif((isset($_POST["login"]))&&(empty($_POST["logusername"]))){
                echo "
                        
                        <div class=\"alert alert-danger\">".$errormsg."
                        <br>
                    ";
            } ?>
        </form>
    </div>
</div>

</body>
</html>

