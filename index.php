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
            
            $per_page = 5;
            
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            
            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }
            
            
            
            
            
            $post_query_count = "SELECT * FROM post";
            $select_all_post = mysqli_query($conn, $post_query_count);
            
            // counting posts
            $count = mysqli_num_rows($select_all_post);
//            echo $count."<br>";
            $count = ceil($count / $per_page);
//            echo $count;
            
            
            $query = "SELECT * FROM post LIMIT $page_1, $per_page ";
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
    
    <ul class="pager">
       <?php
        
//        $pageName = basename($_SERVER['PHP_SELF']);
//        $index = "index.php";

        for ($i = 1; $i <= $count; $i++) {
            
            
            if ($i == $page) {
                 echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
            }
           
            else{
                 echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
            }
           
            }
           
        
        
        ?>
        
        
    </ul>

    <?php
    include 'includes/footer.inc.php';
    
    ?>
