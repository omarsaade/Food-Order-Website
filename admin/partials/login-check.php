<?php
//Authorizatioin Access Control

//check whether the user is logged in or not
if (!isset($_SESSION['user'])) { // if user session is not set

    //User is not Logged in
    //Redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error'>Please log in to access Admin Panel.</div>";
    //Redirect to login page
    header('location:' . SITEURL . 'admin/login.php');
}
