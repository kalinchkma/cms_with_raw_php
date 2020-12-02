<?php

if (isset($_GET['u_id'])){
   $the_user_id = $_GET['u_id'];
    
    $query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
     $selectUserById = mysqli_query($conn, $query);

     while ($row = mysqli_fetch_assoc($selectUserById)) {
         
         $user_name         = $row['user_name'];
         $user_firstname        = $row['user_firstname'];
         $user_lastname   = $row['user_lastname'];
         $user_email          = $row['user_email'];
//         $user_role         = $row['user_role'];
         $user_password          = $row['user_password'];
        
     }
    
    /////////////////////////////
       
        
    
    //////////////////////////
    if(isset($_POST['update_user'])) {
        
         $user_name         = $_POST['user_name'];
         $user_firstname        = $_POST['user_firstname'];
         $user_lastname   = $_POST['user_lastname'];
         $user_email          = $_POST['user_email'];
//         $user_role         = $_POST['user_role'];
         $user_password          = $_POST['new_password'];
        /////// old encrypt password /////////////
//        $query = "SELECT user_randSalt FROM users";
//        $select_randSalt = mysqli_query($conn, $query);
//        $row = mysqli_fetch_array($select_randSalt);
//        $salt = $row['user_randSalt'];
//        $hash_password = crypt($user_password, $salt);
        if(!empty($user_password)) {
            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
            $get_pass_query = mysqli_query($conn, $query_password);
            confirm($get_pass_query);
            
            $row = mysqli_fetch_array($get_pass_query);
            
            $db_user_pass = $row['user_password'];
            
             if ($db_user_pass != $user_password) {
                 $hash_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 12));
             }
            $query = "UPDATE users SET user_name = '{$user_name}', ";
            $query .= " user_firstname = '{$user_firstname}', ";
            $query .= " user_lastname = '{$user_lastname}', ";
            $query .= " user_email = '{$user_email}', ";
//            $query .= " user_role = '{$user_role}', ";
            $query .= " user_password = '{$hash_password}' ";
            $query .= "WHERE user_id = {$the_user_id} ";

            $update_user = mysqli_query($conn, $query);
            confirm($update_user);

        }
       
        
//        $hash_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 12));
        
      
        
    }

    
     
    
    
} else {
    
    
    header("Location: admin");
}

    
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="user_firstname" class="col-sm-12">Firstname</label>
        <div class="col-sm-12">
            <input type="text" value="<?php echo $user_firstname;?>" id="user_firstname" name="user_firstname" class="form-control">
        </div>
    </div>
    
     <div class="form-group row">
        <label for="user_lastname" class="col-sm-12">Lastname</label>
        <div class="col-sm-12">
            <input type="text" value="<?php echo $user_lastname;?>" id="user_lastname" name="user_lastname" class="form-control">
        </div>
    </div>
 
    
<!--
   <div class="form-group row">
      <div class="col-sm-12">
           <select name="user_role" id="">
              <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
             <?php
               
               if ($user_role == 'admin') {
                   echo   '<option value="subscriber">Subscriber</option>';
               } else {
                   echo '<option value="admin">Admin</option>';
               }
               
               ?>
             
               
             
           </select>
       </div>
   </div>
-->
    
    
     <div class="form-group row">
        <label for="user_name" class="col-sm-12">User Name</label>
        <div class="col-sm-12">
            <input type="text" value="<?php echo $user_name;?>" id="user_name" name="user_name" class="form-control">
        </div>
    </div>
     <div class="form-group row">
        <label for="user_email" class="col-sm-12">Email</label>
        <div class="col-sm-12">
            <input type="text" value="<?php echo $user_email;?>" id="user_email" name="user_email" class="form-control">
        </div>
    </div>
<!--
     <div class="form-group row">
        <label for="post_image" class="col-sm-12">Post Image</label>
        <div class="col-sm-12">
            <input type="file" id="post_image" name="post_image">
        </div>
    </div>
-->
     <div class="form-group row">
        <label for="new_password" class="col-sm-12">New Password</label>
        <div class="col-sm-12">
            <input autocomplete="off" type="password"   id="new_password" name="new_password" class="form-control">
        </div>
    </div>
  
    <div class="form-group row">
        <div class="col-sm-12">
           <input type="submit" class="btn btn-primary"  name="update_user" value="Update User">
        </div>
    </div>
</form>


    

