<?php
$servername = "db";
$username   = getenv( "MYSQL_USER"     ) ?: getenv( "MYSQL_ROOT_USER"     );
$password   = getenv( "MYSQL_PASSWORD" ) ?: getenv( "MYSQL_ROOT_PASSWORD" );
$database   = "demo";

// Connect to MySQL
$conn = new mysqli( $servername, $username, $password, $database );
if ( $conn->connect_error ) {
    die( "<p style='color:red'>Connection failed: " . $conn->connect_error . "</p>" );
}

echo "<h1>Hello, World from PHP 5.6 + MySQL!</h1>";

// Simple query
$sql = "SELECT NOW() AS 'current_time'";
if ( $result = $conn->query( $sql ) ) {
    $row = $result->fetch_assoc();
    echo "<p>Current time from MySQL: " . $row[ 'current_time' ] . "</p>";
    $result->free();
} else {
    echo "<p style='color:red'>Query error: " . $conn->error . "</p>";
}

$conn->close();
?>
