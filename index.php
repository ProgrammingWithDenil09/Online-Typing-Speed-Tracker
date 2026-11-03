
<!DOCTYPE html>
<html>
<head>
    <title>TYPE RUSH - Typing Speed Tracker</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h2>⌨ TYPE RUSH</h2>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="leaderboard.php">Leaderboard</a>
    </nav>
</header>

<div class="container">

    <section class="welcome">
        <h1>Welcome to TYPE RUSH!</h1>
        <h3>Type Faster. Think Quicker. Beat Everyone.</h3>

        <p>
            Improve your typing speed and accuracy through
            exciting typing activities and competitions.
        </p>

        <a href="typing.php" class="button">Start Typing Test</a>
    </section>

    <h2>Our Typing Activities</h2>

    <div class="cards">

        <div class="card">
            <h3>Typing Speed Test</h3>
            <p>Test your typing speed in 60 seconds.</p>
            <a href="typing.php?mode=classic">Start</a>
        </div>

        <div class="card">
            <h3>Word Sprint</h3>
            <p>Type as many random words as possible.</p>
            <a href="typing.php?mode=words">Start</a>
        </div>

        <div class="card">
            <h3>Quote Challenge</h3>
            <p>Type interesting quotes accurately.</p>
            <a href="typing.php?mode=quotes">Start</a>
        </div>

        <div class="card">
            <h3>Code Typing</h3>
            <p>Practice HTML, CSS and JavaScript code.</p>
            <a href="typing.php?mode=code">Start</a>
        </div>

        <div class="card">
            <h3>Accuracy Challenge</h3>
            <p>Improve your typing accuracy.</p>
            <a href="typing.php?mode=accuracy">Start</a>
        </div>

        <div class="card">
            <h3>Time Attack</h3>
            <p>Complete as much typing as possible in 30 seconds.</p>
            <a href="typing.php?mode=timeattack">Start</a>
        </div>

    </div>

    <h2>Upcoming Competitions</h2>

    <div class="slider">

        <div class="slide active">
            <h2>100 WPM Challenge</h2>
            <p>Can you achieve 100 words per minute?</p>
            <b>Coming Soon!</b>
        </div>

        <div class="slide">
            <h2>Speed Wars</h2>
            <p>Compete with other typing enthusiasts.</p>
            <b>Registration Opening Soon!</b>
        </div>

        <div class="slide">
            <h2>Accuracy Master</h2>
            <p>Achieve 99% typing accuracy.</p>
            <b>Upcoming Event!</b>
        </div>

        <button onclick="previousSlide()">Previous</button>
        <button onclick="nextSlide()">Next</button>

    </div>

</div>


<footer class="footer">
    <div class="footer-content">

        <div class="footer-section">
            <h3>TYPE RUSH</h3>
            <p>Online Typing Speed Tracker</p>
            <p>Improve your typing speed, accuracy
               and productivity.</p>
        </div>

        <div class="footer-section">
            <h3>Student Details</h3>
            <p>Name: Denil J. Parmar</p>
            <p>Enrollment No: 12402040601015</p>
            <p>Institute: A.D. Patel Institute of Technology</p>
            <p>Semester: CP SEM 5</p>
            <p>Academic Year: 2026-27</p>
        </div>

        <div class="footer-section">
            <h3>Contact Information</h3>
            <p>Email: denilparmar18@gmail.com</p>
            <p>Project: Online Typing Speed Tracker</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>
            &copy; 2026 TYPE RUSH.
            All Rights Reserved.
        </p>
        <p>Designed and Developed by Denil J. Parmar</p>
    </div>
</footer>


<script src="js/script.js"></script>

</body>
</html>
