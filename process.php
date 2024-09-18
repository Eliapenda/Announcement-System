<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "announcement";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
//select courses,classes and departments from the database
 $query1 = "SELECT * FROM institute_courses ";
 $courses = mysqli_query($conn,$query1);

 $query2 = "SELECT * FROM institute_departments ";
 $departments = mysqli_query($conn,$query2);

 $query3= "SELECT * FROM institute_classes ";
 $classes = mysqli_query($conn,$query3);




//COLLECT VALUE
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $studentfname = $_POST['firstname'];
    $studentlname = $_POST['lastname']; 
    $studentdob = $_POST['dob'];
    $studentphone = $_POST['phone_number'];
    $studentemail = $_POST['email'];
    $studentpassword = $_POST['password'];
    $studentcourse = $_POST['course_id'];
    $studentclass = $_POST['class_id'];
    $studentdepartment = $_POST['department_id'];
    
    
$query = "INSERT INTO institute_students( first_name,last_name,dob,class_id,phone_number,email,password,department_id,course_id) VALUES('$studentfname','$studentlname','$studentdob','$studentphone','$studentemail','$studentpassword','$studentcourse','$studentclass','$studentdepartment')"; 
mysqli_query($conn,$query);

}







?>