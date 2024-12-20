<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lab_5b");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE matric = '$matric' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['matric'] = $user['matric'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header("Location: users.php");
        exit();
    } else {
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        Matric: <input type="text" name="matric" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><a href="lab_5b.php">Register here</a></p>
</body>
</html>
