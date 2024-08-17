<style>
  body {background-image: linear-gradient(90deg , beige, #3e423b  );}
  </style>
<?php
include '../pdo.php';
session_start();

echo('<form method="post">
<input type="submit" value="DashBoard" name="dashboard">
</form>');

if(isset($_POST['dashboard'])){
    if($_SESSION['user_type'] == "admin"){
        header( 'Location: http://localhost/e-school%20system/Admin/HomeIndexAdmin.php' ) ;
    }
else if($_SESSION['user_type'] == "student"){
        header( 'Location: http://localhost/e-school%20system/Student/HomeIndexStudent.php' ) ;
    }
else if($_SESSION['user_type'] == "parent"){
        header( 'Location: http://localhost/e-school%20system/Parent/HomeIndexParent.php' ) ;
    }
else if($_SESSION['user_type'] == "teacher"){
        header( 'Location: http://localhost/e-school%20system/teacher/HomeIndexteacher.php' ) ;
    }
    else if($_SESSION['user_type'] == "library"){
        header( 'Location: http://localhost/e-school%20system/Library/HomeIndexLibraryAdmin.php' ) ;
    }
else{
        header( 'Location: http://localhost/e-school%20system/' ) ;
    }
}


if ( isset($_POST['s_ID'])) {

    // Data validation
    if ( strlen($_POST['s_ID']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

$sql = "INSERT INTO attendance (s_ID, Date, Status)
VALUES (:s_ID, :Date, :Status)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':s_ID' => $_POST['s_ID'],
':Date' => $_POST['Date'],
':Status' => $_POST['Status']));
$_SESSION['success'] = 'Record Added';
header( 'Location: index.php' ) ;
return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
unset($_SESSION['error']);
}
?>
<p>Add A New Attendance</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID"></p>
<p>Date:
<input type="date" name="Date"></p>
<p> Status Present(P), Absent(A), Half Day(H):
<input type="text" name="Status"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
