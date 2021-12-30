<?php include 'includes/admin_header.inc.php';?>

<?php
   if (!is_admin($_SESSION['username'])) {
       header('Location: index.php');
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
                        <small>Author</small>
                    </h1>


                <?php
                    if(isset($_GET['source'])) {
                        $source = $_GET['source']; 
                    } else {
                        $source = '';
                    }

                      switch ($source) {
                              
                          case 'add_user':
                              include 'includes/add_user.php';
                              break;
                          case 'edit_user':
                              include "includes/edit_user.php";
                              break;
                          case '90':
                              echo 'Nice 34';
                              break;
                          case '89':
                              echo 'Nice 34';
                              break;
                          default:
                              include 'includes/view_all_users.php';
                      }  




                ?>






                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php  include 'includes/admin_footer.inc.php';  ?>
