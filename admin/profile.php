<?php include 'includes/admin_header.inc.php';?>


 <?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE user_name = '{$username}' "; 
        
        $select_user_profile = mysqli_query($conn, $query);
        
        confirm($select_user_profile);
        
        while ($row = mysqli_fetch_array($select_user_profile)) {
            
             $user_id = $row['user_id'];
             $user_name = $row['user_name'];
             $user_firstname = $row['user_firstname'];
             $user_lastname = $row['user_lastname'];
             $user_email = $row['user_email'];                 
             $user_role = $row['user_role'];
             $user_password = $row['user_password'];
            
        }
        
        
    }

?>

<?php

if (isset($_POST["update_user"])) {
    
        $user_name         = $_POST['user_name'];
         $user_firstname        = $_POST['user_firstname'];
         $user_lastname   = $_POST['user_lastname'];
         $user_email          = $_POST['user_email'];
         $user_role         = $_POST['user_role'];
         $user_password          = $_POST['new_password'];
        
        $query = "UPDATE users SET user_name = '{$user_name}', ";
        $query .= " user_firstname = '{$user_firstname}', ";
        $query .= " user_lastname = '{$user_lastname}', ";
        $query .= " user_email = '{$user_email}', ";
        $query .= " user_role = '{$user_role}', ";
        $query .= " user_password = '{$user_password}' ";
        $query .= "WHERE user_id = {$user_id} ";
        
        $update_user = mysqli_query($conn, $query);
        confirm($update_user);
    
}

?>

<div id="wrapper">

    <!-- Navigation -->


    <?php include 'includes/admin_navigation.inc.php';?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin
                        <small>
                            <?php

                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                }

                            ?>
                        </small>
                    </h1>
                    <!--form-->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="user_firstname" class="col-sm-12">Firstname</label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo $user_firstname;?>" id="user_firstname" name="user_firstname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_lastname" class="col-sm-12">Lastname</label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo $user_lastname;?>" id="user_lastname" name="user_lastname" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="user_role" id="">
                                    <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
                                    <?php

                                       if ($user_role == 'admin') {
                                           echo   '<option value="subscriber">Subscriber</option>';
                                       } else {
                                           echo '<option value="admin">Admin</option>';
                                       }

                                       ?>



                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_name" class="col-sm-12">User Name</label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo $user_name;?>" id="user_name" name="user_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_email" class="col-sm-12">Email</label>
                            <div class="col-sm-12">
                                <input type="text" value="<?php echo $user_email;?>" id="user_email" name="user_email" class="form-control">
                            </div>
                        </div>
                        <!--
                             <div class="form-group row">
                                <label for="post_image" class="col-sm-12">Post Image</label>
                                <div class="col-sm-12">
                                    <input type="file" id="post_image" name="post_image">
                                </div>
                            </div>
                        -->
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-12">New Password</label>
                            <div class="col-sm-12">
                                <input autocomplete="off" type="password"  id="new_password" name="new_password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
                            </div>
                        </div>
                    </form>







                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php  include 'includes/admin_footer.inc.php';  ?>
