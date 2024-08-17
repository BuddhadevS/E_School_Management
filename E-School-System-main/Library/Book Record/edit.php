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


if (isset($_GET['s_ID'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $s_ID = $_POST['s_ID'];
        $Book_ID = $_POST['Book_ID'];
        $Book_Name = $_POST['Book_Name'];
        $Borrow_Date = $_POST['Borrow_Date'];
        $Return_Date = $_POST['Return_Date'];
        // Update the record
        $stmt = $pdo->prepare('UPDATE library SET s_ID = ?, Book_ID = ?, Book_Name = ?, Borrow_Date = ?, Return_Date = ?  WHERE s_ID = ?');
        $stmt->execute([$s_ID, $Book_ID, $Book_Name, $Borrow_Date, $Return_Date, $_GET['s_ID']]);
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' );
    return;
    }
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['s_ID']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM library where s_ID = :xyz");
$stmt->execute(array(":xyz" => $_GET['s_ID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$sid = htmlentities($row['s_ID']);
$bid = htmlentities($row['Book_ID']);
$bname = htmlentities($row['Book_Name']);
$bd = htmlentities($row['Borrow_Date']);
$rd = htmlentities($row['Return_Date']);
?>
<p>Edit Book Record</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID" value="<?= $sid ?>"></p>
<p>Book ID:
<input type="text" name="Book_ID" value="<?= $bid ?>"></p>
<p>Book Name:
<input type="text" name="Book_Name" value="<?= $bname ?>"></p>
<p>Book Borrow Date:
<input type="date" name="Borrow_Date" value="<?= $bd ?>"></p>
<p>Book Return Date:
<input type="date" name="Return_Date" value="<?= $rd ?>"></p>
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>