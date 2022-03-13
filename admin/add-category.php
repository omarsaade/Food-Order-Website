<?php include('partials/menu.php'); ?>
<!-- tmp_name is the temporary name of the uploaded file which is generated automatically 
by php, and stored on the temporary folder on the server. 
name is the original name of the file which is store on the local machine. -->

<!-- A temporary address where the file is located before processing the upload request -->

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>

        <br> <br>
        <!-- add catgeory form starts -->

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="category title"></td>
                </tr>


                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>





                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>



                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>




            </table>
        </form>


        <!-- add catgeory form ends -->


        <?php

        //check whether the submit button is clicked or not
        if (isset($_POST['submit'])) {

            // echo "clicked";

            //1.Get the Value from category from
            $title = $_POST['title'];

            //for radio input type , we need to check whether the button is selected or not

            if (isset($_POST['featured'])) {

                //Get the Value from form

                $featured = $_POST['featured'];
            } else {
                //SET the default VAlue
                $featured = "No";
            }
            //for radio input type , we need to check whether the button is selected or not

            if (isset($_POST['active'])) {

                $active = $_POST['active'];
            } else {
                $active = "NO";
            }
            /////////////////

            //check whether the image is selected or not and set the value from name accordingly
            //print_r can display the value of array but echo can't
            print_r($_FILES['image']);


            die(); //break the code here













            //2.create sql query to insert category into database
            $sql = "INSERT INTO tbl_category SET
            title='$title',
            featured='$featured',
            active='$active'
            ";

            //3-Execute the query and Save in Database
            $res = mysqli_query($conn, $sql);


            // 4-chech whether the query executed or not and data added or not
            if ($res == true) {

                //Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";

                //Redirect to Manage Category Page
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {

                //failed to add Category

                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";

                //Redirect to add Category Page

                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }

        ?>


    </div>
</div>














<?php include('partials/footer.php'); ?>