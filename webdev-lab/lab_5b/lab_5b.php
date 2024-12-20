<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lab_5b");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        Matric: <input type="text" name="matric" required><br>
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>
        Role:
        <select name="role" required>
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
