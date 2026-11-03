
<?php
session_start();
include "db.php";

header("Content-Type: application/json");

if (!isset($_SESSION['user_id'])) {

    echo json_encode([
        "message" => "Login required to save results."
    ]);

    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$activity = $data['activity'] ?? 'classic';
$wpm = max(0, min(500, (int)($data['wpm'] ?? 0)));
$accuracy = max(0, min(100, (float)($data['accuracy'] ?? 0)));
$errors = max(0, (int)($data['errors'] ?? 0));

$allowed = [
    'classic', 'words', 'quotes',
    'code', 'accuracy', 'timeattack'
];

if (!in_array($activity, $allowed, true)) {
    echo json_encode(["message" => "Invalid activity."]);
    exit();
}

$sql = "INSERT INTO results
        (user_id, activity, wpm, accuracy, errors)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "isidi",
    $_SESSION['user_id'],
    $activity,
    $wpm,
    $accuracy,
    $errors
);

if (mysqli_stmt_execute($stmt)) {

    echo json_encode([
        "message" => "Result saved successfully!"
    ]);

} else {

    http_response_code(500);

    echo json_encode([
        "message" => "Unable to save result."
    ]);
}
?>
