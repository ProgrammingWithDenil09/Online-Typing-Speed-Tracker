
<?php
include "db.php";

$message = "";

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO users(name,email,password)
            VALUES(?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt, "sss", $name, $email, $password
    );

    if (mysqli_stmt_execute($stmt)) {
        $message = "Registration Successful!";
    }
    else {
        $message = "Email already exists or registration failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2 align="center">Create Account</h2>

<form method="POST">

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password"
           minlength="6" required>

    <button type="submit" name="register">
        Register
    </button>

    <p><?php echo htmlspecialchars($message); ?></p>

    <a href="login.php">Already have an account? Login</a>

</form>

</body>
</html>
