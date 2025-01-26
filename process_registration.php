<?php
// Database configuration
$servername = "localhost"; // Change if your database server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "pjt1"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, initial, dob, email, phone, gender, blood_group, address_line1, address_line2, city, postal_code, state, country, emergency_contact, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssssssss", $first_name, $last_name, $initial, $dob, $email, $phone, $gender, $blood_group, $address_line1, $address_line2, $city, $postal_code, $state, $country, $emergency_contact, $password);

// Set parameters and execute
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$initial = $_POST['initial'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$state = $_POST['state'];
$country = $_POST['country'];
$emergency_contact = $_POST['emergency_contact'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

if ($stmt->execute()) {
    header("refresh:0.5; url=index.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>