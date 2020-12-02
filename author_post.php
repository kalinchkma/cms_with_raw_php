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
             <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <?php
            
            if (isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }
            $query = "SELECT * FROM post WHERE post_autor = '{$the_post_author}' ";
            
            $post_query = mysqli_query($conn, $query);
            
            while ($row = mysqli_fetch_assoc($post_query)) {
                $postTitle = $row['post_title'];
                $postAutor = $row['post_autor'];
                $postDate = $row['post_date'];
                $postContent = $row['post_content'];
                $postImage = $row['post_image'];
               ?>


           

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $postTitle;?></a>
            </h2>
            <p class="lead">
                <p>All Post <?php echo $postAutor;?></p>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $postImage;?>" alt="">
            <hr>
            <p><?php echo $postContent;?></p>
           

            <hr>

            <?php               
            }
            ?>
            
<!--///////////////////////////////////////////////////-->
    

<!--/////////////////////////////////////////////-->

        </div>

        <!-- Blog Sidebar Widgets Column -->
    
        <?php
        
        include 'includes/sidebar.inc.php';
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php
    include 'includes/footer.inc.php';
    ?>
