<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "lab_5b");

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['matric'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['role'] ?></td>
            <td>
                <a href="update_user.php?matric=<?= $row['matric'] ?>">Update</a>
                <a href="delete_user.php?matric=<?= $row['matric'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
