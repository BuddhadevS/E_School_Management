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



if ( isset($_POST['delete']) && isset($_POST['s_ID']) ) {
    $sql = "DELETE FROM student WHERE s_ID = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['s_ID']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['s_ID']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT s_ID, Name FROM student where s_ID = :xyz");
$stmt->execute(array(":xyz" => $_GET['s_ID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id';
    header( 'Location: index.php' ) ;
    return;
}

?>
<p>Confirm: Deleting <?= htmlentities($row['Name']) ?></p>

<form method="post">
<input type="hidden" name="s_ID" value="<?= $row['s_ID'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="index.php">Cancel</a>
</form>
