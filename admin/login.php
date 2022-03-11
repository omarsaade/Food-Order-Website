<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - Food order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="login">
        <h1 class="text-center">Login </h1><br><br>

        <?php if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }


        if (isset($_SESSION['no-login-message'])) {
            echo   $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }

        ?>


        <!-- Login Form starts Here -->
        <form action="" method="post" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter username">
            <br><br>
            Password: <br>
            <input type="text" name="password" placeholder="Enter Password">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">

            <br><br>


        </form>
        <!-- Login Form Ends Here -->

        <p class="text-center">Created By - <a href="www.omarsaade.com">Omar Saade</a></p>
    </div>

</body>

</html>


<?php
//check whether the submit button is clicked or not

if (isset($_POST['submit'])) {

    //Process for login
    //1-GEt The Data From LOgin form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2-SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3-Execute THe Query
    $res = mysqli_query($conn, $sql);

    //4-COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {

        //User available and login SUccess

        $_SESSION['login'] = "<div class='sucess text-center'>Login Successful</div>";

        $_SESSION['user'] = $username; // to check whether the user is logged in or not and log out will unset it

        //Redirect to HomePage/Dashboard
        header('location:' . SITEURL . 'admin/');
    } else {

        //User not available and login Fall


        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match</div>";

        //Redirect to Login Page
        header('location:' . SITEURL . 'admin/login.php');
    }
}


?>