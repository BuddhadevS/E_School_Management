<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
}

$uname = validate($_POST['uname']);

$pass = validate($_POST['password']);

 if (empty($uname)) {
         header("Location: index.php?error=User Name is required");
         exit();
    }
    
else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }
//login auth for admin part-1
$admin_sql = "SELECT * FROM admin WHERE a_ID='$uname' AND passWord='$pass'";
$admin_result = mysqli_query($conn, $admin_sql);

//login auth for student part-1
$student_sql = "SELECT * FROM student WHERE s_ID='$uname' AND passWord='$pass'";
$student_result = mysqli_query($conn, $student_sql);

//login auth for parent part-1
$parent_sql = "SELECT * FROM parents WHERE p_ID='$uname' AND passWord='$pass'";
$parent_result = mysqli_query($conn, $parent_sql);

//login auth for library admin part-1
$library_sql = "SELECT * FROM library_admin WHERE l_ID='$uname' AND passWord='$pass'";
$library_result = mysqli_query($conn, $library_sql);

//login auth for teachers
$teacher_sql = "SELECT * FROM teachers WHERE t_ID='$uname' AND passWord='$pass'";
 $teacher_result = mysqli_query($conn, $teacher_sql);
 if (mysqli_num_rows($teacher_result) === 1) {
$row = mysqli_fetch_assoc($teacher_result);
    if ($row['t_ID'] === $uname && $row['passWord'] === $pass) {
        echo "Logged in!";
        $_SESSION['user_name'] = $row['t_ID'];
        $_SESSION['user_type'] = "teacher";
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['t_ID'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['number'] = $row['contact_Number'];
            $_SESSION['dob'] = $row['dob'];
        $_SESSION['image'] = $row['img_teacher'];
        header("Location: http://localhost/e-school%20system/Teachers/HomeIndexTeacher.php");
        exit();     
    }
}
//login auth for admin from admin database part-2
 elseif (mysqli_num_rows($admin_result) === 1) {
    $row = mysqli_fetch_assoc($admin_result);
        if ($row['a_ID'] === $uname && $row['passWord'] === $pass) {
            echo "Logged in!";
            $_SESSION['user_name'] = $row['a_ID'];
            $_SESSION['user_type'] = "admin";
            $_SESSION['name'] = $row['a_ID'];
            $_SESSION['id'] = $row['a_ID'];
            $_SESSION['image'] = $row['img_admin'];
            header("Location: http://localhost/e-school%20system/Admin/HomeIndexAdmin.php");
            exit();

    }
 }

//login auth for student part-2
elseif (mysqli_num_rows($student_result) === 1) {
    $row = mysqli_fetch_assoc($student_result);
    if ($row['s_ID'] === $uname && $row['passWord'] === $pass) {
            echo "Logged in!";
            $_SESSION['user_name'] = $row['s_ID'];
            $_SESSION['user_type'] = "student";
            $_SESSION['name'] = $row['Name'];
            $_SESSION['class'] = $row['current_Class'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['number'] = $row['Contact'];
            $_SESSION['dob'] = $row['doB'];
            $_SESSION['id'] = $row['s_ID'];
            $_SESSION['pid'] = $row['p_ID'];
            $_SESSION['image'] = $row['img_student'];
            header("Location: http://localhost/e-school%20system/Student/HomeIndexStudent.php");
            exit();
        }
    }

//login auth for parent part-2
elseif (mysqli_num_rows($parent_result) === 1) {
    $row = mysqli_fetch_assoc($parent_result);
    if ($row['p_ID'] === $uname && $row['passWord'] === $pass) {
            echo "Logged in!";
            $_SESSION['user_name'] = $row['p_ID'];
            $_SESSION['user_type'] = "parent";
            $_SESSION['name'] = $row['Name'];
            $_SESSION['id'] = $row['p_ID'];
            $_SESSION['sid'] = $row['s_ID'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['number'] = $row['Contact'];
            $_SESSION['work'] = $row['occupation'];
            $_SESSION['image'] = $row['img_parent'];
            header("Location: http://localhost/e-school%20system/Parent/HomeIndexParent.php");
            exit();
        }
    }

//login auth for library admin part-2
elseif (mysqli_num_rows($library_result) === 1) {
    $row = mysqli_fetch_assoc($library_result);
    if ($row['l_ID'] === $uname && $row['passWord'] === $pass) {
            echo "Logged in!";
            $_SESSION['user_name'] = $row['l_ID'];
            $_SESSION['user_type'] = "library";
            $_SESSION['name'] = $row['Name'];
            $_SESSION['id'] = $row['l_ID'];
            $_SESSION['image'] = $row['img_library'];
            header("Location: http://localhost/e-school%20system/Library/HomeIndexLibraryAdmin.php");
            exit();
        }
    }
else{

    header("Location: index.php?error=Incorect User name or password");

    exit();

}