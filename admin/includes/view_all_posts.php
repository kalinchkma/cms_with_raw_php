<?php
if ( isset( $_POST['checkBoxArray'] ) ) {

    foreach ( $_POST['checkBoxArray'] as $checkBoxValue ) {
        $bulk_options = $_POST['bulk_options'];

        switch ( $bulk_options ) {
            case "published":
            $query = "UPDATE post SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
            $update_post_status = mysqli_query( $conn, $query );
            confirm( $update_post_status );
            break;
            case "draft":
            $query = "UPDATE post SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
            $update_post_status = mysqli_query( $conn, $query );
            confirm( $update_post_status );
            break;
            case "delete":
            $query = "DELETE  FROM post WHERE post_id = {$checkBoxValue} ";
            $delete_post = mysqli_query( $conn, $query );
            confirm( $delete_post );
            break;
            case "clone":
            $query = "SELECT * FROM post WHERE post_id = {$checkBoxValue} ";
            $select_post = mysqli_query( $conn, $query );
            confirm( $select_post );

            while ( $row = mysqli_fetch_array( $select_post ) ) {
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_author = $row['post_autor'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
            }
            $query = "INSERT INTO post(post_category_id, post_title, post_autor, post_date, post_image, post_content, post_tags, post_status) ";
            $query .= " VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

            $send_post = mysqli_query( $conn, $query );
            confirm($send_post);
            break;
        }
    }
}

?>

<form action="" method="post">

    <table class="table table-bordered table-hover">
        <div class="form-group col-sm-4" id="bulkOptionsContainer">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Option</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="form-group col-sm-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>

        <thead>
            <tr>

                <th><input type="checkbox" class='checkBoxes' id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>

            <?php
$query = "SELECT * FROM post ORDER BY post_id DESC ";

$selectPost = mysqli_query( $conn, $query );

while ( $row = mysqli_fetch_assoc( $selectPost ) ) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_autor = $row['post_autor'];
    $post_category_id = $row['post_category_id'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_views = $row['post_views_count'];

    echo "<tr>";

    ?>
            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $post_id;?>"></td>
           
            <?php

    echo "<td>{$post_id}</td>";
    echo "<td>{$post_autor}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_category_id}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img width='100' src='../images/{$post_image}' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    
    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
    
    $send_query = mysqli_query($conn, $query);
    
    $row = mysqli_fetch_array($send_query);
  
    $comment_count = mysqli_num_rows($send_query);
    
    
    echo "<td> <a href='post_comments.php?id=$post_id'>{$comment_count}</a></td>";
    
    
    
    echo "<td>{$post_date}</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a onClick =\"javascript: return confirm( 'Are you sure you want to delete' );
    \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a href='posts.php?reset={$post_id}'>{$post_views}</a></td>";
    echo "</tr>";
}

?>

        </tbody>
    </table>

</form>

<?php

if ( isset( $_GET['delete'] ) ) {
    $delete_post_id = $_GET['delete'];
    $query = "DELETE FROM post WHERE post_id = {$delete_post_id} ";
    $delete_post = mysqli_query( $conn, $query );
    confirm( $delete_post );
    header( "Location: posts.php" );
}

if (isset($_GET['reset'])) {
    $the_post_id = $_GET['reset'];
    $query = "UPDATE post SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($conn, $the_post_id)." ";
    $reset = mysqli_query($conn, $query);
    confirm($reset);
    header("Location: posts.php");
}

?>
