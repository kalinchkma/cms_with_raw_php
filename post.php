<?php
include 'includes/config.php';
include 'includes/header.inc.php';
?>
<!-- Navigation -->
<?php include 'includes/navigation.inc.php';
?>

<!-- Page Content -->
<div class = "container">

<div class = "row">

<!-- Blog Entries Column -->
<div class = "col-md-8">
<h1 class = "page-header">
Page Heading
<small>Secondary Text</small>
</h1>
<?php

if ( isset( $_GET['p_id'] ) ) {
    $the_post_id = $_GET['p_id'];

    $view_query = "UPDATE post SET post_views_count = post_views_count + 1 WHERE post_id = {$the_post_id}";

    $send_query = mysqli_query( $conn, $view_query );

    $query = "SELECT * FROM post WHERE post_id = {$the_post_id} ";

    $post_query = mysqli_query( $conn, $query );

    while ( $row = mysqli_fetch_assoc( $post_query ) ) {
        $postTitle = $row['post_title'];
        $postAutor = $row['post_autor'];
        $postDate = $row['post_date'];
        $postContent = $row['post_content'];
        $postImage = $row['post_image'];
        ?>

        <!-- First Blog Post -->
        <h2>
        <a href = "#"><?php echo $postTitle;
        ?></a>
        </h2>
        <p class = "lead">
        by <a href = "index.php"><?php echo $postAutor;
        ?></a>
        </p>
        <p><span class = "glyphicon glyphicon-time"></span> <?php echo $postDate;
        ?></p>
        <hr>
        <img class = "img-responsive" src = "images/<?php echo $postImage;?>" alt = "">
        <hr>
        <p><?php echo $postContent;
        ?></p>

        <hr>

        <?php
    }
} else {
    header( "Location: cms01" );
}
?>

<!--///////////////////////////////////////////////////-->
<!-- Blog Comments -->
<?php
if ( isset( $_POST['create_comment'] ) ) {
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    if ( !empty( $comment_author ) && !empty( $comment_email ) && !empty( $comment_content ) ) {

        $query = "insert into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
        $query .= " VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'approved', now())";

        $send_comment = mysqli_query( $conn, $query );

        if ( !$send_comment ) {
            die( "Query Failed ." . mysqli_error( $conn ) );
        }

        //        $query = "UPDATE post SET post_comment_count = post_comment_count + 1 ";
        //        $query .= "WHERE post_id = $the_post_id ";
        //        $update_comment_count = mysqli_query( $conn, $query );

    } else {
        echo "<script>alert('Field cannot be empty');</script>";
    }

}

?>

<!-- Comments Form -->
<div class = "well">
<h4>Leave a Comment:</h4>
<form action = "" method = "post" role = "form">
<div class = "form-group">
<label for = "author">Author: </label>
<input type = "text" id = "author" name = "comment_author" class = "form-control">
</div>
<div class = "form-group">
<label for = "email">Email:</label>
<input type = "email" id = "email" name = "comment_email" class = "form-control">
</div>
<div class = "form-group">
<label for = "comment">Your Comment: </label>
<textarea id = "comment" name = "comment_content" class = "form-control" rows = "3"></textarea>
</div>
<button type = "submit" name = "create_comment" class = "btn btn-primary">Submit</button>
</form>
</div>

<hr>

<!-- Posted Comments -->

<?php
$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= " AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";

$select_comment = mysqli_query( $conn, $query );

if ( !$select_comment ) {
    die( "QUERY FAILED .".mysqli_error( $conn ) );

}

while ( $row = mysqli_fetch_assoc( $select_comment ) ) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];

    ?>

    <!-- Comment -->
    <div class = "media">
    <a class = "pull-left" href = "#">
    <img class = "media-object" src = "http://placehold.it/64x64" alt = "placehold.it">
    </a>
    <div class = "media-body">
    <h4 class = "media-heading"><?php echo $comment_author;
    ?>
    <small><?php echo $comment_date;
    ?></small>
    </h4>
    <?php echo $comment_content;
    ?>
    </div>
    </div>

    <?php  }
    ?>

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
