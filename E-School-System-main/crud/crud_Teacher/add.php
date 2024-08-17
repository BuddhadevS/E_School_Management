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
     && isset($_POST['password'])) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

    $sql = "INSERT INTO teachers (t_ID, name, address, contact_Number, dob, doj, salary, passWord, img_teacher, email_Address)
              VALUES (:t_ID, :name, :address, :contact_Number, :dob, :doj, :salary, :password, :img_teacher, :email_Address)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':t_ID' => $_POST['t_ID'],
        ':name' => $_POST['name'],
        ':address' => $_POST['address'],
        ':contact_Number' => $_POST['contact_Number'],
        ':dob' => $_POST['dob'],
        ':doj' => $_POST['doj'],
        ':salary' => $_POST['salary'],
        ':email_Address' => $_POST['email_Address'],
        ':img_teacher' => $_POST['img_teacher'],
        ':password' => $_POST['password']));
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
<p>Add A New Teacher or Staff</p>
<form method="post">
<p>t_ID:
<input type="text" name="t_ID"></p>
<p>Name:
<input type="text" name="name"></p>
<p>Address:
<input type="text" name="address"></p>
<p>Contact Number of Teacher or Staff:
<input type="text" name="contact_Number"></p>
<p>Date of Birth:
<input type="date" name="dob"></p>
<p>Date of Joining:
<input type="date" name="doj"></p>
<p>Salary:
<input type="text" name="salary"></p>
<p>Password:
<input type="text" name="password"></p>
<p>Email:
<input type="text" name="email_Address"></p>
<p>Upload Teachers Image:
<input type="file" name="img_teacher"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
