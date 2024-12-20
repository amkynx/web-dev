<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "lab_5b");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_users.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST">
        Matric: <input type="text" name="matric" value="<?= $user['matric'] ?>" readonly><br>
        Name: <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
        Role:
        <select name="role" required>
            <option value="student" <?= $user['role'] == 'student' ? 'selected' : '' ?>>Student</option>
            <option value="lecturer" <?= $user['role'] == 'lecturer' ? 'selected' : '' ?>>Lecturer</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
    <p><a href="view_users.php">Cancel</a></p>
</body>
</html>
