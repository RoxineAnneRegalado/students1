<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD System - Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Student</h1>
    <a href="index.php">Back to Student List</a>
    <form method="POST">
        <label>Student ID:</label>
        <input type="text" name="student_id" required><br>
        <label>First Name:</label>
        <input type="text" name="first_name" required><br>
        <label>Middle Name:</label>
        <input type="text" name="middle_name" required><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required><br>
        <label>Course & Section:</label>
        <input type="text" name="course_section" required><br>
        <label>Address:</label>
        <textarea name="address" required></textarea><br>
        <button type="submit" name="submit">Add Student</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $course_section = $_POST['course_section'];
        $address = $_POST['address'];

        // Insert query with student_id
        $sql = "INSERT INTO students (student_id, first_name, middle_name, last_name, course_section, address) 
                VALUES ('$student_id', '$first_name', '$middle_name', '$last_name', '$course_section', '$address')";

        if ($conn->query($sql)) {
            echo "<p>Student added successfully! <a href='index.php'>View Students</a></p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
