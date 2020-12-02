<?php ob_start();?>
<?php include "config.php";?>
<?php session_start();?>
<?php include "../admin/functions.php";?>


<?php

if (isset($_POST['login'])) {
    
    login_user($_POST['username'], $_POST['password']);
    
/*-------------------OLD login code ---------------------------------------*/
/////////////////////////////////////////////////////////////////////////////////
//    $user_name = $_POST['username'];
//    $password = $_POST['password'];
//    
//    $username = mysqli_real_escape_string($conn, $user_name);
//    $password = mysqli_real_escape_string($conn, $password);
//    
//    $query = "SELECT * FROM users WHERE user_name = '{$username}'";
//    $select_user = mysqli_query($conn, $query);
//    
//    if (!$select_user) {
//        die("Query error ." . mysqli_error($conn));
//    }
//    
//    while ($row = mysqli_fetch_array($select_user)) {
//         $db_user_id = $row['user_id'];
//         $db_user_firstname = $row['user_firstname'];
//         $db_user_lastname = $row['user_lastname'];
//         $db_user_role = $row['user_role'];
//         $db_user_name = $row['user_name'];
//         $db_user_password = $row['user_password'];
//    }
//    
////     $password = crypt($password, $db_user_password);
//
//    ///////new way///////////////////////////////////////////
//    if (password_verify($password, $db_user_password)) {
//        $_SESSION['username'] = $db_user_name;
//        $_SESSION['firstname'] = $db_user_firstname;
//        $_SESSION['lastname'] = $db_user_lastname;
//        $_SESSION['user_role'] = $db_user_role;
//        
//        header("Location: ../admin");
//    } else {
//        header("Location: ../index.php");
//    }
//    
//    
    
/////old way/////////////////////////////////////////////
    
//    if ($username !==  $db_user_name && $password !==  $db_user_password) {
//        header("Location: ../index.php");
//    } else if ($username ==  $db_user_name && $password ==  $db_user_password) {
//        $_SESSION['username'] = $db_user_name;
//        $_SESSION['firstname'] = $db_user_firstname;
//        $_SESSION['lastname'] = $db_user_lastname;
//        $_SESSION['user_role'] = $db_user_role;
//        
//        header("Location: ../admin");
//    } else {
//        header("Location: ../index.php");
//    }
    //////////simpler version
    
//    if ($username ===  $db_user_name && $password ===  $db_user_password) {
//        $_SESSION['username'] = $db_user_name;
//        $_SESSION['firstname'] = $db_user_firstname;
//        $_SESSION['lastname'] = $db_user_lastname;
//        $_SESSION['user_role'] = $db_user_role;
//        header("Location: ../admin");
//
//    }else {
//      header("Location: ../index.php");
//
//    } 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////   

}

?>