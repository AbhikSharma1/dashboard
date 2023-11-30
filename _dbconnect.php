<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
 /*echo "You have been successfully connected with your database
  and can now fetch your data";
} else{*/
    die("Error". mysqli_connect_error());
}

?>