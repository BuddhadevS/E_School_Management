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

$sql = "INSERT INTO fees (s_ID, month_Name, transaction_ID, amount,date)
VALUES (:s_ID, :month_Name, :transaction_ID, :amount, :date)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':s_ID' => $_POST['s_ID'],
':month_Name' => $_POST['month_Name'],
':transaction_ID' => $_POST['transaction_ID'],
':amount' => $_POST['amount'],
':date' => $_POST['date']));
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
<p>Add A New Fee Record</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID"></p>
<p>Month Name:
<input type="text" name="month_Name"></p>
<p>Transaction ID:
<input type="text" name="transaction_ID"></p>
<p>Amount:
<input type="text" name="amount"></p>
<p>Date:
<input type="date" name="date"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
