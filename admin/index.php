<?php include 'includes/admin_header.inc.php';?>






<div id="wrapper">



    <?php
    
//    $session = session_id();
//    $time = time();
//    $time_out_in_seconds = 30;
//    $time_out = $time -  $time_out_in_seconds;
//    
//    
//    $query = "SELECT * FROM users_online WHERE session = '$session'";
//    $send_query = mysqli_query($conn, $query);
//    $count = mysqli_num_rows($send_query);
//    
//    if ($count == NULL) {
//        mysqli_query($conn,"INSERT INTO users_online(session, time) VALUES('$session', '$time') ");
//    } else {
//        mysqli_query($conn,"UPDATE users_online SET time = '$time' WHERE session = '$session' ");
//    }
//    
//    $users_online =  mysqli_query($conn,"SELECT * FROM users_online WHERE time > {$time_out}");
//    $count_user = mysqli_num_rows($users_online);
    
    ?>

    <!-- Navigation -->


    <?php include 'includes/admin_navigation.inc.php';?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin

                        <small>
                            <?php
                                echo $_SESSION['username'];
                                ?>
                        </small>
                    </h1>


                </div>
            </div>
            <!-- /.row -->






            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    
                                    $query = "SELECT * FROM post";
                                    $select_all_post = mysqli_query($conn, $query);
                                    $post_count = mysqli_num_rows($select_all_post);
                                    
                                    echo "<div class='huge'>{$post_count}</div>";
                                    ?>



                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comments"; 
                                    $select_all_comment = mysqli_query($conn, $query);
                                    $comment_count = mysqli_num_rows($select_all_comment);
                                    
                                    echo "<div class='huge'>{$comment_count}</div>";
                                    ?>

                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM users";
                                    
                                    $select_all_user = mysqli_query($conn, $query);
                                    $user_count = mysqli_num_rows($select_all_user);
                                    echo "<div class='huge'>{$user_count}</div>";
                                    
                                    
                                    ?>


                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    
                                    $select_all_cat = mysqli_query($conn, $query);
                                    $cat_count = mysqli_num_rows($select_all_cat);
                                    echo "<div class='huge'>{$cat_count}</div>";
                                    
                                    
                                    ?>

                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            
            
            <?php
            
            $query = "SELECT * FROM post WHERE post_status = 'published'";
            $select_all_published_post = mysqli_query($conn, $query);
            $published_post_count = mysqli_num_rows($select_all_published_post);
            
            $query = "SELECT * FROM post WHERE post_status = 'draft'";
            $select_all_draft_post = mysqli_query($conn, $query);
            $draft_post_count = mysqli_num_rows($select_all_draft_post);
            
            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'"; 
            $select_all_unapproved_comment = mysqli_query($conn, $query);
            $comment_unapproved_count = mysqli_num_rows($select_all_unapproved_comment);
            
            $query = "SELECT * FROM comments WHERE comment_status = 'approved'"; 
            $select_all_approved_comment = mysqli_query($conn, $query);
            $comment_approved_count = mysqli_num_rows($select_all_approved_comment);
            
            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";                     
            $select_all_subscriber_user = mysqli_query($conn, $query);
            $user_subscriber_count = mysqli_num_rows($select_all_subscriber_user);
            ?>


            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['', 'Count'],
                            
                            <?php
                            $element_text = ['Active Post', 'Draft Post', 'Comments', 'Approved Comments', 'Unapproved Comments', 'Users', 'Subscriber', 'Categories'];
                            $element_count = [$published_post_count, $draft_post_count, $comment_count, $comment_approved_count, $comment_unapproved_count, $user_count, $user_subscriber_count, $cat_count];
                            
                            for ($i = 0; $i < count($element_text); $i++) {
                                // my way of writing
//                                echo "['{$element_text[$i]}',{$element_count[$i]}],";
                                echo "['{$element_text[$i]}'" . ",". "{$element_count[$i]}],";
                            }
                            
                            
                            ?>
//                            ['posts', 1000],
                           
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                </script>
                 <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>



            </div>







        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php  include 'includes/admin_footer.inc.php';  ?>
