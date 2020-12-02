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
            $query = "SELECT * FROM post";
            
            $post_query = mysqli_query($conn, $query);
            
            $isPost = true;
            
            
            while ($row = mysqli_fetch_assoc($post_query)) {
                
                
                $postId = $row['post_id'];
                $postTitle = $row['post_title'];
                $postAutor = $row['post_autor'];
                $postDate = $row['post_date'];
                $postContent = $row['post_content'];
                $postImage = $row['post_image'];
                $postStatus = $row['post_status'];
                
                if ($postStatus == "published") {
                 $isPost = false;
               ?>


           

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $postId;?>"><?php echo $postTitle;?></a>
            </h2>
            <p class="lead">
                by <a href="author_post.php?author=<?php echo $postAutor;?>&p_id=<?php echo $postId;?>"><?php echo $postAutor;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate;?></p>
            <hr>
            <a href="post.php?p_id=<?php echo $postId;?>">
                <img class="img-responsive" src="images/<?php echo $postImage;?>" alt="">

            </a>
            <hr>
            <p><?php echo $postContent;?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $postId;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <?php               
            } 
            }
            
            if($isPost) {
                echo "<h1>No result..</h1>";
            }
            ?>

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
