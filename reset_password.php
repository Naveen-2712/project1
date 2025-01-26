<?php
include 'db.php';
session_start();

// Fetch user details if logged in
$user = null;
if (isset($_SESSION['email'])) {
    $stmt = $conn->prepare("SELECT first_name FROM users WHERE email = ?");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if ($new_password === $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            // Update the user's password in the database
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);
            if ($stmt->execute()) {
                echo "Password has been updated successfully!";
                header("Location: index.php");
            } else {
                echo "Error updating password: " . $stmt->error;
            }
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .header {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid #2575fc;
        }
        .header h1 {
            margin: 0;
            font-size: 1.8rem;
        }
        .dropdown-menu {
            margin-top: 0; /* Ensure the dropdown appears right below the button */
            left: 0; /* Align dropdown to the left of the button */
            z-index: 1050; /* Ensure it is above other elements */
            transform: translateX(-20%); /* Adjust alignment for better appearance */
            min-width: 210px; /* Set a minimum width to prevent small dropdowns */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reset Password</h1>
        <div>
            <i class="bi bi-bell fs-4 me-4"></i>
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo isset($user) ? htmlspecialchars($user['first_name']) : 'User'; ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="user.php">Profile</a></li>
                    <li><a class="dropdown-item" href="update_user.php">Update Profile</a></li>
                    <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Reset Your Password</h2>
        <form method="POST" action="reset_password.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
