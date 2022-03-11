<?php include('partials/menu.php') ?>

<!-- Menu section starts -->
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage admin</h1>
        <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); // Removing Session Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br> <br> <br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full name</th>
                <th>username</th>
                <th>Actions</th>
            </tr>


            <?php
            //query to Get All Admin
            $sql = "SELECT * FROM tbl_admin";
            //Execute The Query
            $res = mysqli_query($conn, $sql);

            //check wether the query is Executed or not
            if ($res == TRUE) {
                //Count Rows to CHeck wether we have data in database or not
                $count = mysqli_num_rows($res); //function to get all the rows in database
                //check the num of rows
                $sn = 1; // create a varaible and assign the value 
                if ($count > 0) {
                    //we have data in database
                    while ($rows = mysqli_fetch_assoc(($res))) {

                        //using while loop to get all the data from database
                        //and shile loop will run as long we have data in database
                        //get individual Data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //displaying the Values in our table 
            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>



            <?php

                    }
                } else {
                    //we do not have data in database
                }
            }
            ?>

        </table>

    </div>
</div>
<!-- Main Content Section Ends -->


<?php include('partials/footer.php') ?>