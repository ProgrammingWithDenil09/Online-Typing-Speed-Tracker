
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "typing_tracker"
);

if (!$conn) {
    die("Database Error: " . mysqli_connect_error());
}

echo "TYPE RUSH DATABASE CONNECTED SUCCESSFULLY!";
?>
