<?php
$servername = 'db';
$username   = getenv( 'MYSQL_USER'     );
$password   = getenv( 'MYSQL_PASSWORD' );
$database   = 'demo';

// Connect to MySQL
$conn = new mysqli( $servername, $username, $password, $database );
if ( $conn->connect_error ) {
    die( "<p style='color:red'>Connection failed: " . $conn->connect_error . '</p>' );
}

echo '<h1>Hello, World from PHP ' . phpversion() . ' + MySQL!</h1>';

// Check MySQLi extension
if ( extension_loaded( 'mysqli' ) ) {
    $clientInfo = mysqli_get_client_info();
    echo "<p><b>MySQLi client library:</b> $clientInfo</p>";
} else {
    echo "<p style='color:red;'>MySQLi extension not loaded!</p>";
}
// Optional: Check PDO MySQL extension
if ( extension_loaded( 'pdo_mysql' ) ) {
    $pdo = new PDO( "mysql:host=$servername", $username, $password );
    echo '<p><b>PDO driver version:</b> ' . $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION) . '</p>';
} else {
    echo "<p style='color:red;'>PDO MySQL extension not loaded!</p>";
}

// Simple query
$sql = "SELECT NOW() AS 'current_time'";
if ( $result = $conn->query( $sql ) ) {
    $row = $result->fetch_assoc();
    echo '<p>Current time from MySQL: ' . $row[ 'current_time' ] . '</p>';
    $result->free();
} else {
    echo "<p style='color:red'>Query error: " . $conn->error . '</p>';
}

$conn->close();
?>
