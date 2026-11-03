
<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "denil@180906",
    "typing_tracker"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


?>