<?php
include 'db.php';
session_start();

// Ensure user is logged in with valid credentials
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Retrieve updated data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$initial = $_POST['initial'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$country = $_POST['country'];
$emergency_contact = $_POST['emergency_contact'];

// Update user information in the database
$stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, initial=?, dob=?, phone=?, gender=?, address_line1=?, address_line2=?, city=?, postal_code=?, country=?, emergency_contact=? WHERE email=?");
$stmt->bind_param("sssssssssssss", $first_name, $last_name, $initial, $dob, $phone, $gender, $address_line1, $address_line2, $city, $postal_code, $country, $emergency_contact, $_SESSION['email']);

if ($stmt->execute()) {
    // Set a session message for success
    $_SESSION['message'] = "Profile updated successfully!";
    // Redirect to user.php after successful update
    header("Location: user.php");

} else {
    // Set a session message for error
    $_SESSION['message'] = "Error updating record: " . $stmt->error;

}

$stmt->close();
$conn->close();
?>
