<?php include('./partials/menu.php'); ?>
<!-- What is the use of Print_r in PHP?
The print_r() function prints the information about a variable in a more human-readable way. -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>

        <br><br>



        <!-- button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full name</th>
                <th>username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>omar saade</td>
                <td>omsarsaade</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>1.</td>
                <td>omar saade</td>
                <td>omsarsaade</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>1.</td>
                <td>omar saade</td>
                <td>omsarsaade</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>


        </table>

    </div>

</div>



<?php include('./partials/footer.php'); ?>