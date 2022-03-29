<?php
    include 'configure.php';
    error_reporting(0);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $confirm_password = sha1($_POST['confirm_password']);
        
        if($password == $confirm_password){
            $sql = "insert into users (username, email, password) values ('$username', '$email', '$password')";
            $res = mysqli_query($conn, $sql);
            if($res){
                echo "<script>alert('Congratulations $username! Your registration was successful!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['confirm_password'] = "";
               
            }
            else{
                echo "<script>alert('Something went wrong')</script>";
            }
        }
        else{
            echo "<script>alert('Passwords do NOT match!')</script>";
        }
    
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-dark">
        <form action="" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $username?>" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email?>"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $_POST['confirm_password']?>"></div>
            <div class="form-group"><input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password"   value="<?php echo $_POST['confirm_password']?>"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Register</button></div>
            <a href="login.php" class="noaccount">Already have an account? Login</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>