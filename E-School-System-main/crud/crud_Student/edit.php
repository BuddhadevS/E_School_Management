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
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Contact = $_POST['Contact'];
        $doB = $_POST['doB'];
        $doJ = $_POST['doJ'];
        $password = $_POST['password'];
        $email_Address = $_POST['email_Address'];
        $current_Class = $_POST['current_Class'];
        $p_ID = $_POST['p_ID'];
        // Update the record
        $stmt = $pdo->prepare('UPDATE student SET email_Address= ?, s_ID = ?, Name = ?, Address = ?, Contact = ?, doB = ?, doJ = ?, passWord = ?, current_Class = ?, p_ID = ? WHERE s_ID = ?');
        $stmt->execute([$email_Address, $s_ID, $Name, $Address, $Contact, $doB, $doJ, $password, $current_Class, $p_ID, $_GET['s_ID']]);
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

$stmt = $pdo->prepare("SELECT s_ID, Name, Address, Contact, doB, doJ, passWord, current_Class, p_ID, email_Address FROM student where s_ID = :xyz");
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
$p_ID = $row['p_ID'];
$Name = htmlentities($row['Name']);
$Address = htmlentities($row['Address']);
$Contact = htmlentities($row['Contact']);
$doB = htmlentities($row['doB']);
$doJ = htmlentities($row['doJ']);
$password = htmlentities($row['passWord']);
$e = htmlentities($row['email_Address']);
$current_Class = htmlentities($row['current_Class']);
$s_ID = $row['s_ID'];
?>
<p>Edit student</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID" value="<?= $s_ID ?>"></p>
<p>Name:
<input type="text" name="Name" value="<?= $Name ?>"></p>
<p>Address:
<input type="text" name="Address" value="<?= $Address ?>"></p>
<p>Contact:
<input type="text" name="Contact" value="<?= $Contact ?>"></p>
<p>Date of Birth:
<input type="date" name="doB" value="<?= $doB ?>"></p>
<p>Date of Joining:
<input type="date" name="doJ" value="<?= $doJ ?>"></p>
<p>Paswword:
<input type="text" name="password" value="<?= $password ?>"></p>
<p>Current Class:
<input type="text" name="current_Class" value="<?= $current_Class ?>"></p>
<p>Email:
<input type="text" name="email_Address" value="<?= $e ?>"></p>
<p>Parent ID:
<input type="text" name="p_ID" value="<?= $p_ID ?>"></p>
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>