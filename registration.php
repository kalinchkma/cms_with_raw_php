<?php  include "includes/config.php"; ?>
<?php  include "includes/header.inc.php"; ?>

    
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];
    
    if (strlen($username) < 4) {
        $error['username'] = "Username needs to be longger than 4 chracter";
    }
    if ($username == '') {
        $error['username'] = "Username cannot be empty";
    }
    if (username_exist($username)) {
        $error['username'] = "Username already exist, try another";
    }
    
    if ($email == '') {
        $error['email'] = "Email cannot be empty";
    }
    if (email_exist($email)) {
        $error['email'] = "Email already exsit, <a href='index.php'>Please Login</a>";
    }
    if (empty($password)) {
        $error['password'] = "Password cannot be empty";
    }
    if (strlen($password) < 6 && !empty($password)){
        $error['password'] = "Password cannot be less than 6 character";
    }
    
    foreach($error as $key => $value) {
        
        if(empty($value)) {
          unset($error[$key]);
        }

    }
    
    if (empty($error)) {
         register_user( $username, $email, $password );
         login_user($username, $password);
    }
    
    
    
/*---------------- OLD Registration code -----------------------------------------------------------*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//    $username = $_POST['username'];
//    $email    = $_POST['email'];
//    $password = $_POST['password'];
//    
//    
//    if (username_exist($username)) {
//        $message = "username already exist";
//    } else {
//        
//   
//    
//    if (!empty($username) && !empty($email) && !empty($password)) {
//        
//    
//            $username = mysqli_real_escape_string($conn,$username);
//            $email    = mysqli_real_escape_string($conn,$email);
//            $password = mysqli_real_escape_string($conn,$password);
//
//            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
/////////////// old way to encrypt password //////////////////
////            $query = "SELECT user_randSalt FROM users";
////
////            $select_randSalt = mysqli_query($conn, $query);
////
////            if (!$select_randSalt) {
////                die("Query Failed . " . mysqli_error($conn));
////            }
////
////            $row = mysqli_fetch_assoc($select_randSalt);
////            $randSalt = $row['user_randSalt'];
////        
////            $password = crypt($password, $randSalt);
////////////////////////////////////////////////////////////////
//
//            $query = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
//            $query .= "VALUES('{$username}','{$email}','{$password}','subscriber')";
//
//            $register_user_query = mysqli_query($conn, $query);
//
//            if(!$register_user_query) {
//                die("Query error . " . mysqli_error($conn)." ".mysqli_errno($conn));
//            }
//            $message = "Registration success full";
//        
//        
//    } else {
//        $message = "Feild cannot be empty";
//    }
// }
/////////////////////////////////////////////////////////////////////////////////////////////////////////

}





?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.inc.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
<!--                       <h6 class="text-center"><?php //echo $message;?></h6>-->
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input autocomplete="on" type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
                            value="<?php echo isset($username) ? $username : '' ?>">
                            <p style="color: #f8b12b"><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                          
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input autocomplete="on" type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                            value="<?php echo isset($email) ? $email : ''?>">
                            <p style="color: #f8b12b"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                         
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p style="color: #f8b12b"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.inc.php";?>
