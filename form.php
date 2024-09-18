<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "announcement"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from institute_students
$sql_students = "SELECT student_id, first_name, last_name, dob, class_id, phone_number, email, department_id, course_id FROM institute_students";
$result_students = $conn->query($sql_students);

// SQL query to fetch data from institute_staffs
$sql_staffs = "SELECT staff_id, first_name, last_name, dob, department_id, email, phone_number FROM institute_staffs";
$result_staffs = $conn->query($sql_staffs);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Institute Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Institute Students</h2>
<table>
    <tr>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Class ID</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Department ID</th>
        <th>Course ID</th>
    </tr>
    <?php
    // Display students data
    if ($result_students->num_rows > 0) {
        while($row = $result_students->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["student_id"]. "</td>
                    <td>" . $row["first_name"]. "</td>
                    <td>" . $row["last_name"]. "</td>
                    <td>" . $row["dob"]. "</td>
                    <td>" . $row["class_id"]. "</td>
                    <td>" . $row["phone_number"]. "</td>
                    <td>" . $row["email"]. "</td>
                    <td>" . $row["department_id"]. "</td>
                    <td>" . $row["course_id"]. "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No students found</td></tr>";
    }
    ?>
</table>

<h2>Institute Staffs</h2>
<table>
    <tr>
        <th>Staff ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Department ID</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    <?php
    // Display staffs data
    if ($result_staffs->num_rows > 0) {
        while($row = $result_staffs->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["staff_id"]. "</td>
                    <td>" . $row["first_name"]. "</td>
                    <td>" . $row["last_name"]. "</td>
                    <td>" . $row["dob"]. "</td>
                    <td>" . $row["department_id"]. "</td>
                    <td>" . $row["email"]. "</td>
                    <td>" . $row["phone_number"]. "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No staffs found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
