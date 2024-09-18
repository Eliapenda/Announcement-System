
<?php
include "process.php";


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student and Staff Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color * /
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            justify-content: center;
            align-items: center;
            text-align: center;
           
        }
        .modal-content {
            
            background-color: #fefefe;
            margin: 5% auto; /* 5% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 60%; /* Could be more or less, depending on screen size */
            max-width: 600px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 20px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        label {
            display: block;
            margin: 8px 0 4px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
        }
        .radio-group {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
    <script>
        function showModal(userType) {
            var studentModal = document.getElementById("studentModal");
            var staffModal = document.getElementById("staffModal");
            if (userType === 'student') {
                studentModal.style.display = "flex";
                staffModal.style.display = "none";
            } else if (userType === 'staff') {
                staffModal.style.display = "flex";
                studentModal.style.display = "none";
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Close modals when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = "none";
            }
        }
    </script>
</head>
<body>
<h2 style="text-align: center;">Register as Student or Staff</h2>

<div class="radio-group">
    <input type="radio" id="student" name="userType" value="student" onclick="showModal('student')" checked>
    <label for="student">Student</label>
    
    <input type="radio" id="staff" name="userType" value="staff" onclick="showModal('staff')">
    <label for="staff">Staff</label>
</div>
<!-- Student Form Modal -->
<div id="studentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('studentModal')">&times;</span>
        <h3>Student Registration</h3>
        <form action="process.php" method="post">
            <label for="student_firstname">First Name</label>
            <input type="text" id="student_firstname" name="firstname" required>

            <label for="student_lastname">Last Name</label>
            <input type="text" id="student_lastname" name="lastname" required>

            <label for="student_dob">Date of Birth</label>
            <input type="date" id="student_dob" name="dob" required>

            <label for="student_class">Class</label>
            <select id="student_class" name="class_id" required>
                <?php  foreach ($classes as $class) { ?>
                <option value="<?php echo $class['class_id'];?> "><?php echo $class['class_name'];?></option>
                <?php } ?>
            </select>

            <label for="student_department">Department</label>
            <select id="student_department" name="department_id" required>
            <?php  foreach ($departments as $data) { ?>
                <option value="<?php echo $data['department_id'];?>"><?php echo $data['department_name'];?></option>
                
              <?php } ?>
            </select>

            <label for="student_course">Course</label>
            <select id="student_course" name="course_id" required>
            <?php  foreach ($courses as $course) { ?>
                <option value="<?php echo $course['course_id'];?>"><?php echo $course['course_name'];?></option>
                <?php } ?>
            </select>

            <label for="student_phone">Phone Number</label>
            <input type="text" id="student_phone" name="phone_number" required>

            <label for="student_email">Email</label>
            <input type="email" id="student_email" name="email" required>

            <label for="student_password">Password</label>
            <input type="password" id="student_password" name="password" required>

            <button type="submit">Register as Student</button>
        </form>
    </div>
</div>

<!-- Staff Form Modal -->
<div id="staffModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('staffModal')">&times;</span>
        <h3>Staff Registration</h3>
        <form action="process.php" method="post">
            <label for="staff_firstname">First Name</label>
            <input type="text" id="staff_firstname" name="firstname" required>

            <label for="staff_lastname">Last Name</label>
            <input type="text" id="staff_lastname" name="lastname" required>

            <label for="staff_dob">Date of Birth</label>
            <input type="date" id="staff_dob" name="dob" required>

            <label for="staff_department">Department</label>
            <select id="staff_department" name="department_id" required>
                <option value="">Select Department</option>
                <option value="101">Computer Dept</option>
                <option value="102">Civil Dept</option>
                <option value="103">Electrical Detp</option>
                <!-- Add more departments as needed -->
            </select>

            <label for="staff_phone">Phone Number</label>
            <input type="text" id="staff_phone" name="phone_number" required>

            <label for="staff_email">Email</label>
            <input type="email" id="staff_email" name="email" required>

            <label for="staff_password">Password</label>
            <input type="password" id="staff_password" name="password" required>

            <button type="submit">Register as Staff</button>
        </form>
    </div>
</div>

</body>
</html>
