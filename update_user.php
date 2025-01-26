<?php
include 'db.php';
session_start();

// Ensure user is logged in with valid credentials
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Fetch user details from the database based on the user_id
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: #fff;
            color: #000;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            padding: 30px;
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
    <div class="container">
        <h2 class="form-header">Update Your Profile</h2>
        <form method="POST" action="process_update.php">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="initial" class="form-label">Initial</label>
                <input type="text" class="form-control" id="initial" name="initial" value="<?php echo htmlspecialchars($user['initial']); ?>">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address_line1" class="form-label">Address Line 1</label>
                <input type="text" class="form-control" id="address_line1" name="address_line1" value="<?php echo htmlspecialchars($user['address_line1']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="address_line2" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" id="address_line2" name="address_line2" value="<?php echo htmlspecialchars($user['address_line2']); ?>">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo htmlspecialchars($user['postal_code']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="<?php echo htmlspecialchars($user['emergency_contact']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
