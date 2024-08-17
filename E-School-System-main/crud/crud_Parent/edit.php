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


if ( isset($_POST['Name']) && isset($_POST['p_ID'])
     && isset($_POST['password']) && isset($_POST['p_ID']) ) {

    // Data validation
    if ( strlen($_POST['Name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['p_ID']);
        return;
    }

    if ( strlen($_POST['p_ID']) > 4 ) {
        $_SESSION['error'] = 'User is Larger';
        header("Location: edit.php?user_id=".$_POST['p_ID']);
        return;
    }

    $sql = "UPDATE parents SET Name = :Name,
            p_ID = :p_ID, passWord = :password,
            occupation = :occupation, Contact = :Contact,
             Address = :Address, email_Address= :email_Address 
             WHERE p_ID = :p_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':Name' => $_POST['Name'],
        ':p_ID' => $_POST['p_ID'],
        ':Address' => $_POST['Address'],
        ':Contact' => $_POST['Contact'],
        ':occupation' => $_POST['occupation'],
        ':email_Address' => $_POST['email_Address'],
        ':password' => $_POST['password']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['p_ID']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT p_ID, Name, Address, Contact, occupation, passWord, email_Address FROM parents where p_ID = :xyz");
$stmt->execute(array(":xyz" => $_GET['p_ID']));
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

$n = htmlentities($row['Name']);
$a = htmlentities($row['Address']);
$c = htmlentities($row['Contact']);
$o = htmlentities($row['occupation']);
$p = htmlentities($row['passWord']);
$e = htmlentities($row['email_Address']);
$p_ID = $row['p_ID'];
?>
<p>Edit parent</p>
<form method="post">
<p>Name:
<input type="text" name="Name" value="<?= $n ?>"></p>
<p>Address:
<input type="text" name="Address" value="<?= $a ?>"></p>
<p>Password:
<input type="text" name="password" value="<?= $p ?>"></p>
<p>Contact:
<input type="text" name="Contact" value="<?= $c ?>"></p>
<p>Occupation:
<input type="text" name="occupation" value="<?= $o ?>"></p>
<p>Email:
<input type="text" name="email_Address" value="<?= $e ?>"></p>
<input type="hidden" name="p_ID" value="<?= $p_ID ?>">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
