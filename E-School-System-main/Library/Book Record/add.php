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


if ( isset($_POST['s_ID'])) {

    // Data validation
    if ( strlen($_POST['s_ID']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

$sql = "INSERT INTO library (s_ID, Book_ID, Book_Name, Borrow_Date)
VALUES (:s_ID, :Book_ID, :Book_Name, :Borrow_Date)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':s_ID' => $_POST['s_ID'],
':Book_ID' => $_POST['Book_ID'],
':Book_Name' => $_POST['Book_Name'],
':Borrow_Date' => $_POST['Borrow_Date']));
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
<p>Add A New Book Record</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID"></p>
<p>Book ID:
<input type="text" name="Book_ID"></p>
<p>Book Name:
<input type="text" name="Book_Name"></p>
<p>Borrow Date:
<input type="date" name="Borrow Date"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
