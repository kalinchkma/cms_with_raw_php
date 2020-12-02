<?php include 'includes/admin_header.inc.php';?>


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

                    <div class="col-xs-6">
                        
                        <?php
                            insert_categories();
                        ?>
                        <!--//add Categories form-->
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="catTitle">Add Categories</label>
                                <input type="text" name="catTitle" id="catTitle" class="form-control" placeholder="post title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        
                    <!--Edit Catagories form-->
                       <?php 
                        //Update and include Query
                        if (isset($_GET['edit'])) {
                            $catId = $_GET['edit'];
                            include 'includes/update_categories.php';
                           
                        }
                        ?>
                    </div>
                   
                    <div class="col-xs-6">
                       <?php
                        
                        
                        ?>
                       
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                //find all categories
                                findAllCategories();
                                ?>
                               <?php
                                //DELETE QUERY
                                deleteCategories();
                                ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php  include 'includes/admin_footer.inc.php';  ?>
