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
            
             $per_page_post = 4;
            
            if(isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = '';
            }
            
            if ($page == '' || $page == 1) {
                $page_start = 0;
            } else {
                $page_start = ($page * $per_page_post) - $per_page_post;
            }
            
            
           
            
            $post = "SELECT * FROM post";
            $s_post = mysqli_query($conn, $post);
            
            $count = mysqli_num_rows($s_post);
            $count = ceil($count / $per_page_post);
            
            $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT $page_start,$per_page_post";
            
            $select_post = mysqli_query($conn, $query);
            
           
            
            
            if (!$select_post) {
                die("Query Error , " . mysqli_error($conn));
            }
            while($row = mysqli_fetch_array($select_post)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_autor'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_views = $row['post_views_count'];
                
                ?>
            <!--post blog-->
            <h4 class="h1" style="color: red"><?php echo $post_id;?></h4>
            <h2><?php echo $post_title;?></h2>
            <h3><?php echo $post_author;?> </h3>
            <p><span class="glyphicon glyphicon-time"><?php echo $post_date;?></span></p>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <p><?php echo $post_content;?></p>
            
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

    <ul class="pager">
        <?php
        
        
           for($i = 1; $i <= $count; $i++) {
               
               if ($i == $page) {
                    echo "<li><a class='active_link' href='my_pagination.php?page={$i}'>{$i}</a></li>";
               } else {
                   echo "<li><a href='my_pagination.php?page={$i}'>{$i}</a></li>";
               }
               
           }
        
        
        ?>


    </ul>

    <?php
    include 'includes/footer.inc.php';
    
    ?>
