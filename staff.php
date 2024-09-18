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

// Fetch departments
$departments_sql = "SELECT department_id, department_name FROM institute_departments";
$departments_result = $conn->query($departments_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Registration</title>
</head>
<body>
    <h2>Staff Registration Form</h2>
    <form action="process_staff.php" method="POST">
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

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register Staff">
    </form>
</body>
</html>
