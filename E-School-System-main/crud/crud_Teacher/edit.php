<style>
  body {background-image: linear-gradient(90deg , beige, #3e423b  );}
  </style>
<?php
require_once '../../pdo.php';
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


if ( isset($_POST['name']) && isset($_POST['t_ID'])
     && isset($_POST['password']) && isset($_POST['t_ID']) ) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['t_ID']);
        return;
    }

    $sql = "UPDATE teachers SET t_ID = :t_ID,
            name = :name, address = :address,
            contact_Number = :contact_Number, dob = :dob,
            doj = :doj, password = :password,
            salary = :salary, img_teacher = :img_teacher,
            email_Address= :email_Address WHERE t_ID = :t_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':address' => $_POST['address'],
        ':contact_Number' => $_POST['contact_Number'],
        ':dob' => $_POST['dob'],
        ':doj' => $_POST['doj'],
        ':salary' => $_POST['salary'],
        ':img_teacher' => $_POST['img_teacher'],
        ':email_Address' => $_POST['email_Address'],
        ':password' => $_POST['password'],
        ':t_ID' => $_POST['t_ID']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['t_ID']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM teachers where t_ID = :xyz");
$stmt->execute(array(":xyz" => $_GET['t_ID']));
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

$n = htmlentities($row['name']);
$a = htmlentities($row['address']);
$c = htmlentities($row['contact_Number']);
$dob = htmlentities($row['dob']);
$doj = htmlentities($row['doj']);
$s = htmlentities($row['salary']);
$e = htmlentities($row['email_Address']);
$p = htmlentities($row['passWord']);
$t_ID = $row['t_ID'];
?>
<p>Edit Teacher or Staff</p>
<form method="post">
<p>t_ID:
<input type="text" name="t_ID" value="<?= $t_ID ?>"></p>
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Address:
<input type="text" name="address" value="<?= $a ?>"></p>
<p>Contact Number of Teacher or Staff:
<input type="text" name="contact_Number" value="<?= $c ?>"></p>
<p>Date of Birth:
<input type="date" name="dob" value="<?= $dob ?>"></p>
<p>Date of Joining:
<input type="date" name="doj" value="<?= $doj ?>"></p>
<p>Salary:
<input type="text" name="salary" value="<?= $s ?>"></p>
<p>Email:
<input type="text" name="email_Address" value="<?= $e ?>"></p>
<p>Update Teachers Image:
<input type="file" name="img_teacher"></p>
<p>Password:
<input type="text" name="password" value="<?= $p ?>"></p>
<input type="hidden" name="t_ID" value="<?= $t_ID ?>">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
