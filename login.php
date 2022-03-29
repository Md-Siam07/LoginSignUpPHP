<?php
    include 'configure.php';

    session_start();
    error_reporting(0);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "select * from users where username = '$username' and password = '$password'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header('Location: welcome.php');
        }else{
            echo "<script>alert('Invalid Credentials!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $username?>"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']?>"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button></div>
            <a href="register.php" class="noaccount">Don't have an account? SignUp</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>