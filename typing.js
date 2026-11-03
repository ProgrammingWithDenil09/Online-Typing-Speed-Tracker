
let timeLeft = 60;
let timer = null;
let started = false;
let completed = false;

const input = document.getElementById("userInput");
const sample = document.getElementById("sampleText").innerText;

const duration = document.getElementById("duration");

function calculateResult() {

    let typedText = input.value;

    let correct = 0;
    let errors = 0;

    for (let i = 0; i < typedText.length; i++) {

        if (typedText[i] === sample[i]) {
            correct++;
        }
        else {
            errors++;
        }
    }

    let elapsed = Number(duration.value) - timeLeft;

    // Avoid division by zero
    elapsed = Math.max(elapsed, 1);

    let wpm = Math.round(
        (correct / 5) / (elapsed / 60)
    );

    let accuracy = typedText.length > 0
        ? Math.round((correct / typedText.length) * 100)
        : 100;

    document.getElementById("wpm").innerText = wpm;

    document.getElementById("accuracy").innerText = accuracy;

    document.getElementById("errors").innerText = errors;

    return {
        wpm: wpm,
        accuracy: accuracy,
        errors: errors
    };
}

function startTest() {

    clearInterval(timer);

    timeLeft = Number(duration.value);

    started = false;
    completed = false;

    input.value = "";
    input.disabled = false;

    document.getElementById("time").innerText = timeLeft;

    document.getElementById("finalResult").innerHTML = "";

    calculateResult();

    input.focus();
}

input.addEventListener("input", function() {

    if (completed) return;

    if (!started) {

        started = true;

        timer = setInterval(function() {

            timeLeft--;

            document.getElementById("time").innerText = timeLeft;

            calculateResult();

            if (timeLeft <= 0) {
                finishTest();
            }

        }, 1000);
    }

    calculateResult();

    if (input.value.length >= sample.length) {
        finishTest();
    }
});

function finishTest() {

    if (completed) return;

    completed = true;

    clearInterval(timer);

    input.disabled = true;

    let result = calculateResult();

    document.getElementById("finalResult").innerHTML = `
        <h2>Typing Test Completed!</h2>
        <h3>Your WPM: ${result.wpm}</h3>
        <h3>Your Accuracy: ${result.accuracy}%</h3>
        <h3>Your Errors: ${result.errors}</h3>
        <p>Thank you for participating!</p>
        <button onclick="startTest()">Try Again</button>
    `;

    // Send result to PHP backend
    fetch("result.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({
            activity: window.typingMode,
            wpm: result.wpm,
            accuracy: result.accuracy,
            errors: result.errors
        })

    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
    })
    .catch(error => {
        console.log("Result saving failed:", error);
    });
}

duration.addEventListener("change", startTest);

// Initialize the test
startTest();
