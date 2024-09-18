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

// Fetch departments
$departments_sql = "SELECT department_id, department_name FROM institute_departments";
$departments_result = $conn->query($departments_sql);

// Fetch courses
$courses_sql = "SELECT course_id, course_name FROM institute_courses";
$courses_result = $conn->query($courses_sql);

// Fetch classes
$classes_sql = "SELECT class_id, class_name FROM institute_classes";
$classes_result = $conn->query($classes_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Registration Form</h2>
    <form action="process_student.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br><br>

        <label for="department_id">Department:</label>
        <select name="department_id" required>
            <option value="">Select Department</option>
            <?php
            if ($departments_result->num_rows > 0) {
                while($row = $departments_result->fetch_assoc()) {
                    echo "<option value='" . $row['department_id'] . "'>" . $row['department_name'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="course_id">Course:</label>
        <select name="course_id" required>
            <option value="">Select Course</option>
            <?php
            if ($courses_result->num_rows > 0) {
                while($row = $courses_result->fetch_assoc()) {
                    echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="class_id">Class:</label>
        <select name="class_id" required>
            <option value="">Select Class</option>
            <?php
            if ($classes_result->num_rows > 0) {
                while($row = $classes_result->fetch_assoc()) {
                    echo "<option value='" . $row['class_id'] . "'>" . $row['class_name'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register Student">
    </form>
</body>
</html>
