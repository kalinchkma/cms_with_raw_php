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
            
            if (isset($_GET['category'])) {
                $cat_id = $_GET['category'];
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                $select = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($select)) {
                    $cat_title = $row['cat_title'];
                }
                
            }
            $query = "SELECT * FROM post WHERE post_category_id = '$cat_title' ";
            
            $post_query = mysqli_query($conn, $query);
            if (!$post_query) {
                die("Query Faild .".mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($post_query)) {
                $postId = $row['post_id'];
                $postTitle = $row['post_title'];
                $postAutor = $row['post_autor'];
                $postDate = $row['post_date'];
                $postContent = $row['post_content'];
                $postImage = $row['post_image'];
               ?>


           

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $postId;?>"><?php echo $postTitle;?></a>
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
