
<?php
include "db.php";

$sql = "SELECT
        users.name,
        MAX(results.wpm) AS best_wpm,
        ROUND(AVG(results.accuracy), 2) AS accuracy

        FROM users

        INNER JOIN results
        ON users.id = results.user_id

        GROUP BY users.id, users.name

        ORDER BY best_wpm DESC

        LIMIT 20";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Typing Leaderboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h2>TYPE RUSH</h2>

    <nav>
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="typing.php">Typing Test</a>
    </nav>
</header>

<div class="container">

    <h1>Typing Leaderboard</h1>

    <p>Top typing performers on TYPE RUSH.</p>

    <table>

        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Best WPM</th>
            <th>Average Accuracy</th>
        </tr>

        <?php
        $rank = 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
            <td><?php echo $rank++; ?></td>

            <td>
                <?php echo htmlspecialchars($row['name']); ?>
            </td>

            <td>
                <?php echo $row['best_wpm']; ?>
            </td>

            <td>
                <?php echo $row['accuracy']; ?>%
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
