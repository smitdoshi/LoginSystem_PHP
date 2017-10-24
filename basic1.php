<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 10/18/17
 * Time: 9:18 PM
 */
?>

<!DOCTYPE HTML>
<html>
<head>
    <title><h2>This is a Title</h2></title>
</head>
<body>
    <?php
    // Declaring a variable
    $var1 = "Your Name";
        echo "Hello, Please provide ".$var1."<br>";
    //STATIC
    // static use:Normally, when a function is completed/executed, all of its variables are deleted.
    // However, sometimes we want a local variable NOT to be deleted. We need it for a further job.

    function staticTest(){
            static $x=10;
            echo $x ."<br>";
            $x++;
    }
    staticTest();
    staticTest();

    ?>
</body>
</html>