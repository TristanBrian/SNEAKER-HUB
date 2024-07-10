
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
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="wrapper">
        <div class="login-wrapper">
            <div class="login-header">Register</div>
            <div class="login-form">
                <?php
                if (isset($_POST["submit"])) {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $repeatpassword = $_POST["repeat_password"];

                    $passwordHash = password_hash ($password, PASSWORD_DEFAULT);
                    $errors = array();

                    if (empty($username) OR empty($email) OR empty($password) OR empty($repeatpassword)) {
                        array_push($errors, "All fields are Required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }
                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 characters long");
                    }
                    if ($password !== $repeatpassword) {
                        array_push($errors, "Password does not match");
                    }
                    require_once "database.php";
                    $sql ="SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query ($conn, $sql);
                    $rowCount= mysqli_num_rows ($result);
                    if ($rowCount>0){
                        array_push ($errors, "Email already exists");
                    }
                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    } else {
                      //insert data for db

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt =mysqli_stmt_init ($conn);
$prepareStmt = mysqli_stmt_prepare ($stmt,$sql);
if ($prepareStmt) {
    mysqli_stmt_bind_param ($stmt,"sss",$username, $email, $passwordHash);
  mysqli_stmt_execute ($stmt);
  echo "<div class= 'alert alert-success'>You are registered successfully.</div>";  
}
else {
    die ("something went wrong");
}
}
            }
            
                ?>
                <form action="reg.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="username:">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email:">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="password:">
                    </div>
                    <div class="form-group">
                        <input type="password" name="repeat_password" placeholder="Repeat password:">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Register" name="submit">
                    </div>
                </form>

                <span>Already have an account? <a href="login.php">Login</a></span>
            </div>
        </div>
    </div>
</body>
</html>