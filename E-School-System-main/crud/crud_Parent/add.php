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
     && isset($_POST['password'])) {

    // Data validation
    if ( strlen($_POST['Name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

    $sql = "INSERT INTO parents (p_ID, Name, Address, Contact, occupation, passWord, email_Address)
              VALUES (:p_ID, :Name, :Address, :Contact, :occupation, :password, :email_Address)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':Name' => $_POST['Name'],
        ':p_ID' => $_POST['p_ID'],
        ':Address' => $_POST['Address'],
        ':Contact' => $_POST['Contact'],
        ':occupation' => $_POST['occupation'],
        ':email_Address' => $_POST['email_Address'],
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
<p>Add A New parents</p>
<form method="post">
<p>Name:
<input type="text" name="Name"></p>
<p>p_ID:
<input type="text" name="p_ID"></p>
<p>Password:
<input type="password" name="password"></p>
<p>Address:
<input type="text" name="Address"></p>
<p>Contact:
<input type="text" name="Contact"></p>
<p>Occupation:
<input type="text" name="occupation"></p>
<p>Email:
<input type="text" name="email_Address"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
