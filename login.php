<?php
session_start ();
if (isset ($_SESSION {"user"})){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">

    <?php
    if(isset($_POST["login"])) {
        $email = $_POST ["email"];
        $password = $_POST["password"];
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result =mysqli_query($conn, $sql);
        $user = mysqli_fetch_array ($result, MYSQLI_ASSOC);
        if ($user){
           if (password_verify ($password, $user["password"] )){
            session_start ();
            $_SESSION ["user"]= "Yes";
            header("Location:index.php");
            exit(); // Use exit() instead of die()
           }else {
            echo"<div class ='alert alert-danger'>Password does not match </div>";

           }
        } else {
            echo "<div class= 'alert alert-danger'>Email does not exist </div>";
        }
    }
     ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:"  name="email" class= "form-control">
            </div>

            <div class="form-group">
                <input type="password" placeholder="Enter password:"  name="password" class= "form-control"> <!-- Corrected name attribute -->
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div> 
        </form>
        <span> Don't have an account? <a href="reg.php"> Register </a> </span>
    </div>
</body>
</html>