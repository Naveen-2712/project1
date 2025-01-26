<?php
session_start();
include 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin credentials
    if ($email === 'admin' && $password === 'admin') {
        $_SESSION['email'] = $email; // Store email in session for admin
        $_SESSION['is_admin'] = true;
        header("Location: admin.php");
        exit();
    }
    // User credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email']; // Store email in session for user
            $_SESSION['user_id'] = $user['id'];
            header("Location: user.php"); // Redirect to user.php after successful login
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    } else {
        $error = 'Invalid email or password.';
    }

    // User credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: user.php"); // Redirect to user.php after successful login
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    } else {
        $error = 'Invalid email or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex; /* Use Flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
        }
        .container {
            width: 100%; /* Full width */
            max-width: 400px; /* Set a maximum width */
            margin: 0 auto; /* Center horizontally */
            padding: 2rem; /* Add padding */
            background: #fff;
            color: #000;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #2575fc;
        }
        .btn-primary {
            background: #2575fc;
            border: none;
        }
        .btn-primary:hover {
            background: #6a11cb;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form method="POST">
    <div class="container p-5">
        <h2 class="form-header">Sign In</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
            <div class="text-center mt-3">
                <p>Don't have an account? <a href="registration.php" class="text-primary">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
