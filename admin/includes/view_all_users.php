
     <table class="table table-bordered table-hover">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Username</th>
                 <th>Firstname</th>
                 <th>Lastname</th>
                 <th>Email</th>
                 <th>Role</th>
                 
                 
                
             </tr>
         </thead>
         <tbody>

            <?php
             $query = "SELECT * FROM users";

             $select_users = mysqli_query($conn, $query);

             while ($row = mysqli_fetch_assoc($select_users)) {
                 $user_id = $row['user_id'];
                 $user_name = $row['user_name'];
                 $user_firstname = $row['user_firstname'];
                 $user_lastname = $row['user_lastname'];
                 $user_email = $row['user_email'];                 
                 $user_role = $row['user_role'];
                 $user_image = $row['user_image'];
                 $user_password = $row['user_password'];
                 
                 
                 echo "<tr>";
                 echo "<td>{$user_id}</td>";
                 echo "<td>{$user_name}</td>";
                 echo "<td>{$user_firstname}</td>";
                 echo "<td>{$user_lastname}</td>";
                 echo "<td>{$user_email}</td>";
                 echo "<td>{$user_role}</td>";
                 
                
                
//                 $query = "SELECT * FROM post WHERE post_id = $comment_post_id ";
//                 
//                 $select_post_id_query = mysqli_query($conn, $query);
//                 if (!$select_post_id_query) {
//                     die("QUERY FAILED . " . mysqli_error($conn));
//                 }
//                 
//                 while($row = mysqli_fetch_assoc($select_post_id_query)) {
//                     $post_id = $row['post_id'];
//                     $post_title = $row['post_title'];
//                     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//                    }
               
                 echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                 echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                 echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                 echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>edit</a></td>";


                 echo "</tr>";
             }




             ?>


         </tbody>
     </table>
     
    
   
  
 <?php
if (isset($_GET['change_to_admin'])) {
    if(isset($_SESSION['user_role'])) {
    $user_id = $_GET['change_to_admin'];
    $query = "update users set user_role = 'admin' where user_id = {$user_id} ";
    $ap_comment = mysqli_query($conn, $query);
    confirm($ap_comment);
    header("Location: users.php");
    }
}

if (isset($_GET['change_to_subscriber'])) {
    if (isset($_SESSION['user_role'])) {
    $user_id = $_GET['change_to_subscriber'];
    $query = "update users set user_role = 'subscriber' where user_id = {$user_id} ";
    $un_comment = mysqli_query($conn, $query);
    confirm($un_comment);
    header("Location: users.php");
    }
}

if (isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
        
    $delete_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
    $delete_comment = mysqli_query($conn, $query);
    confirm($delete_comment);
    header("Location: users.php");
    }
}

 ?>