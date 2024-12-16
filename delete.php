<?php
include 'db.php';

// Check if 'id' is set and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Student deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error: Unable to delete student.');</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid ID.');</script>";
}

// Redirect back to the index page
header("Location: index.php");
exit;
?>
