       <div class="col-md-4">



           <!-- Blog Search Well -->
           <div class="well">

               <form action="search.php" method="post">
                   <h4>Blog Search</h4>
                   <div class="input-group">
                       <input name="search" type="text" class="form-control">
                       <span class="input-group-btn">
                           <!--                           <input type="submit" name="submit" value="search" class="btn btn-primary">-->
                           <button type="submit" name="submit" class="btn btn-default">
                               <span class="glyphicon glyphicon-search"></span>
                           </button>
                       </span>
                   </div>
               </form>
               <!-- /.input-group -->
           </div>

           <!--login form-->
           <div class="well">
               <?php
           
                   if (!isset($_SESSION['username'])) {
                       include "includes/login-form.php";
                   }else {
                       echo "<h4 class='h4'>LogOut:</h4>";
                       echo "<a class='btn btn-primary' href='includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>";
                   }
           
           
               ?>
        

           </div>



           <!-- Blog Categories Well -->

           <div class="well">

               <?php
            $query = "SELECT * FROM categories LIMIT 3";
                
            $select_catagories_sidebar = mysqli_query($conn, $query);
            
             
                
            ?>





               <h4>Blog Categories</h4>
               <div class="row">
                   <div class="col-lg-6">
                       <ul class="list-unstyled">

                           <?php
                              while($row = mysqli_fetch_assoc( $select_catagories_sidebar)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id  = $row['cat_id'];

                                    echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";

                                }
                
                           ?>

                       </ul>
                   </div>
                   <!-- /.col-lg-6 -->
                   <!--
                   <div class="col-lg-6">
                       <ul class="list-unstyled">
                           <li><a href="#">Category Name</a>
                           </li>
                           <li><a href="#">Category Name</a>
                           </li>
                           <li><a href="#">Category Name</a>
                           </li>
                           <li><a href="#">Category Name</a>
                           </li>
                       </ul>
                   </div>
-->
                   <!-- /.col-lg-6 -->
               </div>
               <!-- /.row -->
           </div>

           <!-- Side Widget Well -->
           <?php
           include 'widget.php';
           ?>
       </div>
