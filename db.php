
<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "typing_tracker"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


?>
