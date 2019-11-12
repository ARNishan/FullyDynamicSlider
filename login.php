
<?php 
   include'Session.php';
   Session::checklogin();
?>
<?php

$host="localhost";
$user="root";
$password="";
$db="test";

$conn= mysqli_connect($host,$user,$password);
mysqli_select_db($conn, $db);

if(isset($_POST['email'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from users where email='".$email."'AND password='".$password."' limit 1";

    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        Session::set('login',true);
         header("Location:index.php");
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>



<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h2>Admin login</h2>
        </div>

        <!-- Login Form -->
        <form method="POST" action="#">
            <input type="text" id="user" class="fadeIn second" name="email" placeholder="email">
            <input type="password" id="pass" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
</body>
</html>