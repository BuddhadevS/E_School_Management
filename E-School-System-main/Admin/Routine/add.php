<style>
  body {background-image: linear-gradient(90deg , beige, #3e423b  );}
  </style>
<?php
include '../../pdo.php';
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
else if($_SESSION['user_type'] == "teacher"){
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


if ( isset($_POST['day_class'])) {

    // Data validation
    if ( strlen($_POST['day_class']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

$sql = "INSERT INTO routine (day_class, class, day, Period_1, Period_2, Period_3, Period_4)
VALUES (:day_class, :class, :day, :Period_1, :Period_2, :Period_3, :Period_4)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':day_class' => $_POST['day_class'],
':class' => $_POST['class'],
':day' => $_POST['day'],
':Period_1' => $_POST['Period_1'],
':Period_2' => $_POST['Period_2'],
':Period_3' => $_POST['Period_3'],
':Period_4' => $_POST['Period_4']));
$_SESSION['success'] = 'Record Added';
header( 'Location: index.php' );
return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
unset($_SESSION['error']);
}
?>
<p>Add A New Routine</p>
<form method="post">
<p>Day-Class:
<input type="text" name="day_class"></p>
<p>Class:
<input type="text" name="class"></p>
<p>Day:
<input type="text" name="day"></p>
<p>Period-1:
<input type="text" name="Period_1"></p>
<p>Period-2:
<input type="text" name="Period_2"></p>
<p>Period-3:
<input type="text" name="Period_3"></p>
<p>Period-4:
<input type="text" name="Period_4"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
