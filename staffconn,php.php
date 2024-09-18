<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "announcement";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$department_id = $_POST['department_id'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert data into the staff table
$sql = "INSERT INTO institute_staffs (first_name, last_name, dob, department_id, email, password, phone_number) 
        VALUES ('$first_name', '$last_name', '$dob', $department_id, '$email', '$password', '$phone_number')";

if ($conn->query($sql) === TRUE) {
    echo "Staff registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
