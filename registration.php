<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        <h2 class="form-header">Sign Up</h2>
        <form action="process_registration.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
                </div>
                <div class="col-md-4">
                    <label for="initial" class="form-label">Initial</label>
                    <input type="text" class="form-control" id="initial" name="initial" placeholder="Enter your initial">
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="blood_group" class="form-label">Blood Group</label>
                <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="Enter your blood group" required>
            </div>
            <div class="mb-3">
                <label for="address_line1" class="form-label">Address Line 1</label>
                <input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="House/Flat Number" required>
            </div>
            <div class="mb-3">
                <label for="address_line2" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Street/Block Name" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>
                <div class="col-md-4">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" pattern="[0-9]{6}" required>
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
            </div>
            <div class="mb-3">
                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                <input type="tel" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter emergency contact number" pattern="[0-9]{10}" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="col-md-6">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>
    
</body>
</html>
