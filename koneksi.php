<?php 
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "stand.in";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("500 | Internal server error");

}else {
    
}
