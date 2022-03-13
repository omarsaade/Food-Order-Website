<?php


//include constants.php file here
include('../config/constants.php');

//1-get the id of the admin to be deleted
$id = $_GET['id'];

//2-create sql query to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

//check whether the query executed successuflly or not
if ($res == true) {

    //Query Executed Successfully and Admin Deleted
    // echo "Admin Deleted";
    // create session variable to display Message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    //Redirect To Manage Admin Page
    header('location:' . SITEURL . 'admin/manage-admin.php');
} else {

    // Failed to delete admin
    // echo "Failed to Delete Admin";
    $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin . Try Again Later.</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
}

//3-Redirect TO manage admin page with message (success/error)
