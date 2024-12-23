<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students Table</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php
    $students = [
        ['name' => 'Alice', 'program' => 'BIP', 'age' => 21],
        ['name' => 'Bob', 'program' => 'BIS', 'age' => 20],
        ['name' => 'Raju', 'program' => 'BIT', 'age' => 22],
    ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Program</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['program'] . "</td>";
                echo "<td>" . $student['age'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
