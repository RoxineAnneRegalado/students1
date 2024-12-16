<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Students</h1>
    <a href="create.php">Add New Student</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Course & Section</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM students");
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= isset($row['id']) ? $row['id'] : 'N/A' ?></td>
                    <td><?= $row['student_id'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['middle_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['course_section'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
