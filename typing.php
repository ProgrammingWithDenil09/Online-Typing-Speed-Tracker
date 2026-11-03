
<?php
session_start();

$mode = $_GET['mode'] ?? 'classic';

$texts = [
    "classic" => "Practice makes a person perfect. Keep typing every day to improve your speed and accuracy.","This is my Portfolio and its a proud moment for me to announce my first online portable portfolio creation for better user experience and relevance.",
    
    "words" => "computer keyboard mouse internet programming website learning practice speed accuracy challenge",

    "quotes" => "Success is the sum of small efforts repeated day in and day out.",

    "code" => 'function greet() { return "Hello World"; }',

    "accuracy" => "Accuracy is more important than speed. Focus on every character and avoid typing mistakes.",

    "timeattack" => "Fast fingers and a focused mind can help you achieve your typing goals."
];

if (!isset($texts[$mode])) {
    $mode = "classic";
}

$sample = $texts[$mode];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Typing Test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h2>TYPE RUSH</h2>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="leaderboard.php">Leaderboard</a>
    </nav>
</header>

<div class="container">

    <h1>Typing Speed Test</h1>

    <div class="test-box">

        <h3>Select Test Duration</h3>

        <select id="duration">
            <option value="15">15 Seconds</option>
            <option value="30">30 Seconds</option>
            <option value="60" selected>60 Seconds</option>
            <option value="120">120 Seconds</option>
        </select>

        <h3>Time: <span id="time">60</span> Seconds</h3>

        <h3>Sample Text</h3>

        <p id="sampleText">
            <?php echo htmlspecialchars($sample); ?>
        </p>

        <textarea id="userInput"
                  rows="5"
                  placeholder="Start typing here..."
                  spellcheck="false"></textarea>

        <br>

        <button onclick="startTest()">Start / Restart</button>

        <button onclick="finishTest()">Finish Test</button>

        <h3>Live Statistics</h3>

        <p>WPM: <span id="wpm">0</span></p>

        <p>Accuracy: <span id="accuracy">100</span>%</p>

        <p>Errors: <span id="errors">0</span></p>

        <div id="finalResult"></div>

    </div>

</div>

<script>
window.typingMode = <?php echo json_encode($mode); ?>;
</script>

<script src="js/typing.js"></script>

</body>
</html>
