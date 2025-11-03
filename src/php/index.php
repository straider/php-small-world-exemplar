<?php
$servername = "db";
$username   = "root";
$password   = getenv( "MYSQL_PASSWORD" ) ?: getenv( "MYSQL_ROOT_PASSWORD" );
$database   = "demo";

// Connect to MySQL
$conn = new mysqli( $servername, $username, $password, $database );
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}

echo "<h1>Hello, World from PHP 5.6 + MySQL!</h1>";

// Simple query
$result = $conn->query( "SELECT NOW() AS 'current_time'" );
$row    = $result->fetch_assoc();
echo "<p>Current time from MySQL: " . $row[ 'current_time' ] . "</p>";

$conn->close();
?>
