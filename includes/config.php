<?php
ob_start();
//define("db_host", "localhost", true);
//define("db_user", "hunter", true);
//define("db_pass", "universe10211", true);
//define("db_name", "cms", true);
//
//$conn = mysqli_connect(db_host, db_user, db_pass, db_name);
//if(!$conn) {
//    die("Database error!!!");
//} else {
//    echo "Database connected";
//}
/* Another way */
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';

foreach($db as $key => $values) {
    define(strtoupper($key), $values);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$conn) {
    die ("DB error ".mysqli_error());

}