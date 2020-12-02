<?php

function redirect( $location ) {
    return header( "Location:" . $location );
}

// function for sql injection

function escape( $string ) {
    global $conn;
    //    strip_tags() ignore the html tag
    mysqli_real_escape_string( $conn, trim( strip_tags( $string ) ) );
}

function users_online() {

    if ( isset( $_GET['onlineusers'] ) ) {
        global $conn;
        if ( !$conn ) {
            session_start();
            include "../includes/config.php";

            $session = session_id();
            $time = time();
            $time_out_in_seconds = 05;
            $time_out = $time -  $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $send_query = mysqli_query( $conn, $query );
            $count = mysqli_num_rows( $send_query );

            if ( $count == NULL ) {
                mysqli_query( $conn, "INSERT INTO users_online(session, time) VALUES('$session', '$time') " );
            } else {
                mysqli_query( $conn, "UPDATE users_online SET time = '$time' WHERE session = '$session' " );
            }

            $users_online =  mysqli_query( $conn, "SELECT * FROM users_online WHERE time > {$time_out}" );
            echo $count_user = mysqli_num_rows( $users_online );

        }

    }

}

users_online();

function confirm( $result ) {
    global $conn;
    if ( !$result ) {
        die( 'Query Error .' . mysqli_error( $conn ) );
    }

}

function insert_categories() {
    global $conn;
    if ( isset( $_POST['submit'] ) ) {
        $catTitle = $_POST['catTitle'];

        if ( $catTitle == "" || empty( $catTitle ) ) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES('{$catTitle}') ";

            $createCategoryQuery = mysqli_query( $conn, $query );

            if ( !$createCategoryQuery ) {
                die( "Query Faild" . mysqli_error( $conn ) );
            }
        }
    }
}

function findAllCategories() {
    global $conn;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_assoc( $select_categories ) ) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete<a/></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>edit<a/></td>";
        echo "</tr>";
    }
}

function deleteCategories() {
    global $conn;
    if ( isset( $_GET['delete'] ) ) {
        $theCatId = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$theCatId} ";

        $deleteQuery = mysqli_query( $conn, $query );

        //just for refresh
        header( "Location: categories.php" );
    }
}

function is_admin( $username = "" ) {
    global $conn;
    $query = "SELECT user_role FROM users WHERE user_name = '$username' ";
    $result = mysqli_query( $conn, $query );
    confirm( $result );

    $row = mysqli_fetch_array( $result );

    if ( $row['user_role'] == 'admin' ) {
        return true;
    } else {
        return false;
    }

}

function username_exist( $username ) {
    global $conn;
    $query = "SELECT user_name FROM users WHERE user_name = '$username' ";
    $result = mysqli_query( $conn, $query );
    confirm( $result );

    if ( mysqli_num_rows( $result ) > 0 ) {
        return true;
    } else {
        return false;
    }
}

function email_exist( $email ) {
    global $conn;
    $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
    $result = mysqli_query( $conn, $query );
    confirm( $result );

    if ( mysqli_num_rows( $result ) > 0 ) {
        return true;
    } else {
        return false;
    }

}

function register_user( $username, $email, $password ) {

    global $conn;

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $username = mysqli_real_escape_string( $conn, $username );
    $email    = mysqli_real_escape_string( $conn, $email );
    $password = mysqli_real_escape_string( $conn, $password );

    $password = password_hash( $password, PASSWORD_BCRYPT, array( 'cost' => 11 ) );

    $query = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
    $query .= "VALUES('{$username}','{$email}','{$password}','subscriber')";

    $register_user_query = mysqli_query( $conn, $query );

    confirm( $register_user_query );

}


function login_user($username, $password) {
    global $conn;
    
    $username = trim($username);
    $password = trim($password);
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    $query = "SELECT * FROM users WHERE user_name = '{$username}'";
    $select_user = mysqli_query($conn, $query);
    
   confirm($select_user);
    
    while ($row = mysqli_fetch_array($select_user)) {
         $db_user_id = $row['user_id'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];
         $db_user_name = $row['user_name'];
         $db_user_password = $row['user_password'];
    }
    

    if (password_verify($password, $db_user_password)) {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        
        redirect('/cms01/admin');
    } else {
       redirect('/cms01/index.php');
    }
    
    
    
}

