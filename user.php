<?php
session_start();

// Check if the user is logged in with valid credentials
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// Fetch user details from the database based on the user_id
include 'db.php'; // Ensure the database connection is included
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
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa; /* Grey background for the body */
            color: black; /* Change font color to black */
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
        .container {
            margin-top: 20px;
        }
        .welcome-container {
            font-size: 1.5rem; /* Increase font size of the welcome message */
            text-align: left; /* Align to the left */
            margin-bottom: 20px; /* Add some space below the welcome message */
        }
        .dropdown-menu {
            margin-top: 0; /* Ensure the dropdown appears right below the button */
            left: 0; /* Align dropdown to the left of the button */
            z-index: 1050; /* Ensure it is above other elements */
            transform: translateX(-20%); /* Adjust alignment for better appearance */
            min-width: 210px; /* Set a minimum width to prevent small dropdowns */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a soft shadow for better visibility */
}
    </style>
</head>
<body>
    <div class="header">
        <h1>User Dashboard</h1>
        <div>
            <i class="bi bi-bell fs-4 me-4"></i>
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo htmlspecialchars($user['first_name']); ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="update_user.php">Update Profile</a></li>
                    <li><a class="dropdown-item" href="reset_password.php">Reset Password</a></li>
                    <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-container">Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</div>
        
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address_line1" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control" id="address_line1" name="address_line1" value="<?php echo htmlspecialchars($user['address_line1']); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address_line2" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control" id="address_line2" name="address_line2" value="<?php echo htmlspecialchars($user['address_line2']); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo htmlspecialchars($user['postal_code']); ?>" readonly>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="<?php echo htmlspecialchars($user['emergency_contact']); ?>" readonly>
            </div>
    </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
