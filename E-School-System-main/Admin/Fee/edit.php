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



if (isset($_POST['s_ID'])) {

    // Data validation
    if ( strlen($_POST['s_ID']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['s_ID']);
        return;
    }

    $sql = "UPDATE fees SET s_ID = :s_ID,
            month_Name = :month_Name, transaction_ID = :transaction_ID,
            amount = :amount, date = :date
            WHERE s_ID = :s_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':s_ID' => $_POST['s_ID'],
        ':month_Name' => $_POST['month_Name'],
        ':transaction_ID' => $_POST['transaction_ID'],
        ':date' => $_POST['date'],
        ':amount' => $_POST['amount']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['s_ID']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM fees where s_ID = :xyz");
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
$d = htmlentities($row['date']);
$a = htmlentities($row['amount']);
$tid = htmlentities($row['transaction_ID']);
$mname = $row['month_Name'];
?>
<p>Edit Fee Record</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID" value="<?= $sid ?>"></p>
<p>Transaction ID:
<input type="text" name="transaction_ID" value="<?= $tid ?>"></p>
<p>Month Name:
<input type="text" name="month_Name" value="<?= $mname ?>"></p>
<p>Amount:
<input type="text" name="amount" value="<?= $a ?>"></p>
<p>Date:
<input type="Date" name="date" value="<?= $d ?>"></p>
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
