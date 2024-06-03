<?php

$server_name = "localhost"; // Change if MySQL is running on a different server
$user_name = "root"; // Change if using a different username
$password = ""; // Change if using a different password
$database_name = "summer_p"; // Change if using a different database name
$mysql_port = 3307; // Specify the custom port number as an integer

// Establishing a connection to the MySQL database
$conn = new mysqli($server_name, $user_name, $password, $database_name, $mysql_port);

// Checking if the connection was successful
if(!$conn)
{
     die("Connection Failed: ". mysqli_connect_error());
}
?>


