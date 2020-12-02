<?php
if (isset($_POST['publish_post'])) {
            $post_title = $_POST['post_title'];
            $post_category_id = $_POST['post_categories'];
            $post_author = $_POST['post_author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
//            $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO post(post_category_id, post_title, post_autor, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= " VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";
    
    $send_post = mysqli_query($conn, $query);
    
    confirm($send_post);
    $the_post_id = mysqli_insert_id($conn);
    
     echo "<p class='bg-success'>Post Created. <a class='btn btn-default' href='../post.php?p_id={$the_post_id}'>View Post</a> or <a class='btn btn-default' href='posts.php'>Edit More</a></p> ";
    
}
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="post_title" class="col-sm-12">Post Title</label>
        <div class="col-sm-12">
            <input type="text" id="post_title" name="post_title" class="form-control">
        </div>
    </div>
    
     <div class="form-group row">
<!--        <label for="post_category_id" class="col-sm-12">Post Category Id</label>-->
        <div class="col-sm-12">
<!--            <input type="text" id="post_category_id" name="post_category_id" class="form-control">-->
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
            <input type="text" id="post_author" name="post_author" class="form-control">
        </div>
    </div>
     <div class="form-group row">
<!--        <label for="post_status" class="col-sm-12">Post Status</label>-->
        <div class="col-sm-12">
<!--            <input type="text" id="post_status" name="post_status" class="form-control">-->
       <select name="post_status" id="">
            <option value="">Select Option</option>
           <option value="published">Publish</option>
           <option value="draft">Draft</option>
       </select>
        </div>
    </div>
     <div class="form-group row">
        <label for="post_image" class="col-sm-12">Post Image</label>
        <div class="col-sm-12">
            <input type="file" id="post_image" name="post_image">
        </div>
    </div>
     <div class="form-group row">
        <label for="post_tags" class="col-sm-12">Post Tags</label>
        <div class="col-sm-12">
            <input type="text" id="post_tags" name="post_tags" class="form-control">
        </div>
    </div>
     <div class="form-group row">
        <label for="post_content" class="col-sm-12">Post Content</label>
        <div class="col-sm-12">
            <textarea name="post_content" rows="10" id="post_content" class="form-control" ></textarea>
        </div>
    </div>
    <div class="form-group row">
      
        <div class="col-sm-12">
           <input type="submit" class="btn btn-primary"  name="publish_post" value="Publish Post">
        </div>
    </div>
</form>
