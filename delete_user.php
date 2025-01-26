<?php
include 'db.php';
session_start();

// Ensure only admin can access this page
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: index.php");
    exit();
}

// Check if the user ID is provided
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Redirect back to admin page with success message
        header("Location: admin.php?message=User deleted successfully");
    } else {
        // Redirect back with error message
        header("Location: admin.php?message=Error deleting user");
    }

    $stmt->close();
} else {
    // Redirect back with error message if no ID is provided
    header("Location: admin.php?message=No user ID provided");
}

$conn->close();
?>
