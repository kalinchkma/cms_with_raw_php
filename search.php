<?php 
    include 'includes/config.php';
    include 'includes/header.inc.php';
?>

<!-- Navigation -->
<?php include 'includes/navigation.inc.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            
             
           
           if(isset($_POST['submit'])){
              $search = $_POST['search'];
               
               $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%' ";
               
               $search_query =  mysqli_query($conn, $query);
               
               if(!$search_query){
                   die("Error mysqli!" . mysqli_error());
               }
               
               $count  = mysqli_num_rows($search_query);
               
               if( $count == 0 ){
                   echo "<h1> NO result </h1>";
               } else {
                   

//                $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%' ";
            
                $post_query = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($post_query)) {
                    $postTitle = $row['post_title'];
                    $postAutor = $row['post_autor'];
                    $postDate = $row['post_date'];
                    $postContent = $row['post_content'];
                    $postImage = $row['post_image'];
                   ?>


            <h1 class="page-header">
                Search
                <!-- <small>Secondary Text</small> -->
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $postTitle;?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $postAutor;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $postImage;?>" alt="">
            <hr>
            <p><?php echo $postContent;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <?php               
                    }
                     }


                }

                    ?>









        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
           
           if(isset($_POST['submit'])){
              $search = $_POST['search'];
               
               $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%' ";
               
               $search_query =  mysqli_query($conn, $query);
               
               if(!$search_query){
                   die("Error mysqli!" . mysqli_error());
               }
               
               $count  = mysqli_num_rows($search_query);
               
               if( $count == 0 ){
                   echo "<h1> NO result </h1>";
               }
               
               
           } 
               
           
           ?>
        <?php
        
        include 'includes/sidebar.inc.php';
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php
    include 'includes/footer.inc.php';
    ?>
