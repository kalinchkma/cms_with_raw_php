<?php include 'includes/admin_header.inc.php';?>


<div id="wrapper">

    <!-- Navigation -->


    <?php include 'includes/admin_navigation.inc.php';?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin
                        <small>Author</small>
                    </h1>





                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>In Response to</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_GET['id'])){
                            
             $query = "SELECT * FROM comments WHERE comment_post_id = ".mysqli_real_escape_string($conn, $_GET['id'])." ";

             $select_comments = mysqli_query($conn, $query);

             while ($row = mysqli_fetch_assoc($select_comments)) {
                 $comment_id = $row['comment_id'];
                 $comment_author = $row['comment_author'];
                 $comment_post_id = $row['comment_post_id'];
                 $comment_content = $row['comment_content'];
                 $comment_email = $row['comment_email'];                 
                 $comment_status = $row['comment_status'];
                 $comment_date = $row['comment_date'];
                 
                 echo "<tr>";
                 echo "<td>{$comment_id}</td>";
                 echo "<td>{$comment_author}</td>";
                 echo "<td>{$comment_content}</td>";
                 echo "<td>{$comment_email}</td>";
                 echo "<td>{$comment_status}</td>";
                 
                 echo "<td>{$comment_date}</td>";
                
                 $query = "SELECT * FROM post WHERE post_id = $comment_post_id ";
                 
                 $select_post_id_query = mysqli_query($conn, $query);
                 if (!$select_post_id_query) {
                     die("QUERY FAILED . " . mysqli_error($conn));
                 }
                 
                 while($row = mysqli_fetch_assoc($select_post_id_query)) {
                     $post_id = $row['post_id'];
                     $post_title = $row['post_title'];
                     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                    }
               
                 echo "<td><a href='post_comments.php?approve=$comment_id&id=".$_GET['id']."'>Approve</a></td>";
                 echo "<td><a href='post_comments.php?unapprove=$comment_id&id=".$_GET['id']."'>Unapprove</a></td>";
                 echo "<td><a href='post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";


                 echo "</tr>";
             }


                            }

             ?>


                        </tbody>
                    </table>




                    <?php
if (isset($_GET['approve'])) {
    $ap_comment_id = $_GET['approve'];
    $query = "update comments set comment_status = 'approved' where comment_id = $ap_comment_id ";
    $ap_comment = mysqli_query($conn, $query);
    confirm($ap_comment);
   header("Location: post_comments.php?id=".$_GET['id']."");
}

if (isset($_GET['unapprove'])) {
    $un_comment_id = $_GET['unapprove'];
    $query = "update comments set comment_status = 'unapproved' where comment_id = $un_comment_id ";
    $un_comment = mysqli_query($conn, $query);
    confirm($un_comment);
    header("Location: post_comments.php?id=".$_GET['id']."");
}

if (isset($_GET['delete'])) {
    $delete_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";
    $delete_comment = mysqli_query($conn, $query);
    confirm($delete_comment);
    header("Location: post_comments.php?id=".$_GET['id']."");
}

 ?>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php  include 'includes/admin_footer.inc.php';  ?>
