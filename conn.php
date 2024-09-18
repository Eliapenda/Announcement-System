<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "announcement";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data and insert into the database
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$department_id = $_POST['department_id'];
$course_id = $_POST['course_id'];
$class_id = $_POST['class_id'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert data into the students table
$sql = "INSERT INTO institute_students (first_name, last_name, dob, class_id, phone_number, email, password, department_id, course_id) 
        VALUES ('$first_name', '$last_name', '$dob', $class_id, '$phone_number', '$email', '$password', $department_id, $course_id)";

if ($conn->query($sql) === TRUE) {
    echo "Student registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
