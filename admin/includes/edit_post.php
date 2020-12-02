<?php

if (isset($_GET['p_id'])){
   $the_post_id = $_GET['p_id'];
    
    $query = "SELECT * FROM post WHERE post_id = {$the_post_id}";
     $selectPostById = mysqli_query($conn, $query);

     while ($row = mysqli_fetch_assoc($selectPostById)) {
         $post_id            = $row['post_id'];
         $post_title         = $row['post_title'];
         $post_author        = $row['post_autor'];
         $post_category_id   = $row['post_category_id'];
         $post_date          = $row['post_date'];
         $post_image         = $row['post_image'];
         $post_tags          = $row['post_tags'];
         $post_comment_count = $row['post_comment_count'];
         $post_status        = $row['post_status'];
         $post_content       = $row['post_content'];
     }
    
    if (isset($_POST['update_post'])) {
             $post_title = $_POST['post_title'];
             $post_category_id = $_POST['post_categories'];
             $post_author = $_POST['post_author'];
             $post_status = $_POST['post_status'];
             $post_image = $_FILES['post_image']['name'];
             $post_image_temp = $_FILES['post_image']['tmp_name'];
             $post_tags = $_POST['post_tags'];
             $post_content = $_POST['post_content'];
        
       move_uploaded_file($post_image_temp, "../images/$post_image");
     
        
      
        
        if(empty($post_image)) {
            $query = "SELECT * FROM post WHERE post_id = {$the_post_id} ";
            $selet_query = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($selet_query)) {
                $post_image = $row['post_image'];
            }
        }
        
        $query  = "UPDATE post SET ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_autor = '{$post_author}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_status = '{$post_status}' ";
       
        $query .= "WHERE post_id = {$the_post_id} ";
        
//        $query = "UPDATE post SET post_category_id = '{$post_category_id}', post_title = '{$post_title}', post_autor = '{$post_author}', post_date = now(), post_image = '{$post_image}', post_content ='{$post_content}', post_tags = '{$post_tags}', post_status = '{$post_status}' WHERE post_id = {$the_post_id} ";
//        
        $update_post = mysqli_query($conn, $query);
        
        confirm($update_post);
        echo "<p class='bg-success'>Post Updated. <a class='btn btn-default' href='../post.php?p_id={$the_post_id}'>View Post</a> or <a class='btn btn-default' href='posts.php'>Edit More</a></p> ";

    }
     
    
    
}

    
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="post_title" class="col-sm-12">Post Title</label>
        <div class="col-sm-12">
            <input value="<?php if(isset($post_title)) echo $post_title; ?>" type="text" id="post_title" name="post_title" class="form-control">
        </div>
    </div>
    <div class="form-group row">
       
        <div class="col-sm-12">
            <select name="post_categories" id="post_categories">
                <?php
                $query = "SELECT * FROM categories ";
                
                $select_categories = mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_title = $row['cat_title'];
                    
                    echo "<option value='{$cat_title}'>{$cat_title}</option>";
                }
                
                ?>
                
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="post_author" class="col-sm-12">Post Author</label>
        <div class="col-sm-12">
            <input value="<?php if(isset($post_author)) echo $post_author; ?>" type="text" id="post_author" name="post_author" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
       <div class="col-sm-12">
           <select name="post_status" id="">
            <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
            <?php
            if ($post_status == "published") {
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='published'>Published</option>";
            }
            ?>
        </select>
       </div>
        
    </div>
    
    
<!--
    <div class="form-group row">
        <label for="post_status" class="col-sm-12">Post Status</label>
        <div class="col-sm-12">
            <input value="<?php if(isset($post_status)) echo $post_status; ?>" type="text" id="post_status" name="post_status" class="form-control">
        </div>
    </div>
-->
    
    
    <div class="form-group row">
        <label for="post_image" class="col-sm-12">Post Image</label>
        <div class="col-sm-12">
        <img width="100" style="margin-bottom: 10px;" src="../images/<?php echo $post_image;?>" alt="image" />
            <input type="file" id="post_image" name="post_image">
        </div>
    </div>
    <div class="form-group row">
        <label for="post_tags" class="col-sm-12">Post Tags</label>
        <div class="col-sm-12">
            <input value="<?php if(isset($post_tags)) echo $post_tags; ?>" type="text" id="post_tags" name="post_tags" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="post_content" class="col-sm-12">Post Content</label>
        <div class="col-sm-12">
            <textarea name="post_content" rows="10" id="post_content" class="form-control"><?php if(isset($post_content)) echo $post_content; ?></textarea>
        </div>
    </div>
    <div class="form-group row">

        <div class="col-sm-12">
            <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
        </div>
    </div>
</form>



