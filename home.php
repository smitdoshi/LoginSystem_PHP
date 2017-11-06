<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/21/17
 * Time: 6:57 PM
 */
include "session.php";

?>

<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="styleshee" href="css/home.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<html>
    <head>
        <title>HomePage</title>
    </head>
    <body class="container-fluid">

        <div class="container">

            <div class="text-center">
                <h1>Homepage</h1>
            </div>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">WebSiteName</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> <?php echo $_SESSION['login_usr'];?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <div class="item active">
                <img src="assest/image/slide1.jpg" class="img-responsive" alt="">
            </div>
            
            <div class="col-md-5 text-center col-md-offset-3">
                <form role="form" method="post" action>
                    <div class="fomr-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope">
                                </span>
                                E-Mail
                            </span>
                            <input name="email" class="form-control" placeholder="Enter your email to get exclusive Offers">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </body>
</html>