<?php
if (isset($_POST['create_user'])) {
            $user_firstname = $_POST['user_firstname'];
            $user_name = $_POST['user_name'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
//            $post_date = date('d-m-y');

    $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
//    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_role, user_password) ";
    $query .= "VALUES ('{$user_name}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '{$password}' )";
    
    $create_user = mysqli_query($conn, $query);
    
    confirm($create_user);
   
    echo "User Created: "." "."<a class='btn btn-default' href='users.php'>View Users</a>";
    
    
}
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="user_firstname" class="col-sm-12">Firstname</label>
        <div class="col-sm-12">
            <input type="text" id="user_firstname" name="user_firstname" class="form-control">
        </div>
    </div>
    
     <div class="form-group row">
        <label for="user_lastname" class="col-sm-12">Lastname</label>
        <div class="col-sm-12">
            <input type="text" id="user_lastname" name="user_lastname" class="form-control">
        </div>
    </div>
 
    
   <div class="form-group row">
      <div class="col-sm-12">
           <select name="user_role" id="">
              <option value="subscriber">Select Option</option>
               <option value="admin">Admin</option>
               <option value="subscriber">Subscriber</option>
           </select>
       </div>
   </div>
    
    
     <div class="form-group row">
        <label for="user_name" class="col-sm-12">User Name</label>
        <div class="col-sm-12">
            <input type="text" id="user_name" name="user_name" class="form-control">
        </div>
    </div>
     <div class="form-group row">
        <label for="user_email" class="col-sm-12">Email</label>
        <div class="col-sm-12">
            <input type="text" id="user_email" name="user_email" class="form-control">
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
        <label for="user_password" class="col-sm-12">Password</label>
        <div class="col-sm-12">
            <input type="password" id="user_password" name="user_password" class="form-control">
        </div>
    </div>
  
    <div class="form-group row">
        <div class="col-sm-12">
           <input type="submit" class="btn btn-primary"  name="create_user" value="Add User">
        </div>
    </div>
</form>