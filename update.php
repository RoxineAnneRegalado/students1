<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $course_section = $_POST['course_section'];
    $address = $_POST['address'];

    // Update query with student_id
    $sql = "UPDATE students SET 
            student_id='$student_id', 
            first_name='$first_name', 
            middle_name='$middle_name', 
            last_name='$last_name', 
            course_section='$course_section', 
            address='$address' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD System - Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Student</h1>
    <a href="index.php">Back to Student List</a>
    <form method="POST">
        <label>Student ID:</label>
        <input type="text" name="student_id" value="<?= $row['student_id'] ?>" required><br>
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= $row['first_name'] ?>" required><br>
        <label>Middle Name:</label>
        <input type="text" name="middle_name" value="<?= $row['middle_name'] ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= $row['last_name'] ?>" required><br>
        <label>Course & Section:</label>
        <input type="text" name="course_section" value="<?= $row['course_section'] ?>" required><br>
        <label>Address:</label>
        <textarea name="address" required><?= $row['address'] ?></textarea><br>
        <button type="submit" name="update">Update Student</button>
    </form>
</body>
</html>
