
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

$sql = "SELECT
        COUNT(*) AS total,
        MAX(wpm) AS best,
        AVG(accuracy) AS avg_accuracy
        FROM results WHERE user_id=?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$stats = mysqli_fetch_assoc(
    mysqli_stmt_get_result($stmt)
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h2>TYPE RUSH</h2>
    <nav>
        <a href="index.php">Home</a>
        <a href="typing.php">Typing Test</a>
        <a href="leaderboard.php">Leaderboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>

    <h2>Your Performance</h2>

    <div class="cards">

        <div class="card">
            <h3>Total Tests</h3>
            <h2><?php echo $stats['total']; ?></h2>
        </div>

        <div class="card">
            <h3>Best WPM</h3>
            <h2><?php echo $stats['best'] ?? 0; ?></h2>
        </div>

        <div class="card">
            <h3>Average Accuracy</h3>
            <h2><?php echo round($stats['avg_accuracy'] ?? 0, 2); ?>%</h2>
        </div>

    </div>

    <h2>Start Your Activities</h2>

    <div class="cards">
        <div class="card">
            <h3>Classic Typing Test</h3>
            <a href="typing.php?mode=classic">Start</a>
        </div>

        <div class="card">
            <h3>Word Sprint</h3>
            <a href="typing.php?mode=words">Start</a>
        </div>

        <div class="card">
            <h3>Quote Challenge</h3>
            <a href="typing.php?mode=quotes">Start</a>
        </div>

        <div class="card">
            <h3>Code Typing</h3>
            <a href="typing.php?mode=code">Start</a>
        </div>

        <div class="card">
            <h3>Accuracy Master</h3>
            <a href="typing.php?mode=accuracy">Start</a>
        </div>

        <div class="card">
            <h3>Time Attack</h3>
            <a href="typing.php?mode=timeattack">Start</a>
        </div>
    </div>

    <p><a href="leaderboard.php">View Leaderboard</a></p>

</div>

</body>
</html>
