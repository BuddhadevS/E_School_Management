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


if ( isset($_POST['day_class']) ) {

    // Data validation
    if ( strlen($_POST['day_class']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?day_class=".$_POST['day_class']);
        return;
    }

    $sql = "UPDATE routine SET day_class = :day_class,
            class = :class, day = :day,
            Period_1 = :Period_1, Period_2 = :Period_2,
            Period_3 = :Period_3, Period_4 = :Period_4
            WHERE day_class = :day_class";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':day_class' => $_POST['day_class'],
        ':day' => $_POST['day'],
        ':class' => $_POST['class'],
        ':Period_1' => $_POST['Period_1'],
        ':Period_2' => $_POST['Period_2'],
        ':Period_3' => $_POST['Period_3'],
        ':Period_4' => $_POST['Period_4']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that day_class is present
if ( ! isset($_GET['day_class']) ) {
  $_SESSION['error'] = "Missing day-class";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM routine where day_class = :xyz");
$stmt->execute(array(":xyz" => $_GET['day_class']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for Day-Class';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$dc = htmlentities($row['day_class']);
$c = htmlentities($row['class']);
$d = htmlentities($row['day']);
$p1 = htmlentities($row['Period_1']);
$p2 = htmlentities($row['Period_2']);
$p3 = htmlentities($row['Period_3']);
$p4 = htmlentities($row['Period_4']);
?>
<p>Edit Routine</p>
<form method="post">
<p>Day-Class:
<input type="text" name="day_class" value="<?= $dc ?>"></p>
<p>Class:
<input type="text" name="class" value="<?= $c ?>"></p>
<p>Day:
<input type="text" name="day" value="<?= $d ?>"></p>
<p>Period-1:
<input type="text" name="Period_1" value="<?= $p1 ?>"></p>
<p>Period-2:
<input type="text" name="Period_2" value="<?= $p2 ?>"></p>
<p>Period-3:
<input type="text" name="Period_2" value="<?= $p3?>"></p>
<p>Period-4:
<input type="text" name="Period_2" value="<?= $p4 ?>"></p>
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
