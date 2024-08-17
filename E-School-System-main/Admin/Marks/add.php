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


if ( isset($_POST['term']) && isset($_POST['s_ID'])){

    // Data validation
    if ( strlen($_POST['term']) < 1 || strlen($_POST['s_ID']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

    $sql = "INSERT INTO marks (s_ID, term, math, english, hindi)
              VALUES (:s_ID, :term, :math, :english, :hindi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':s_ID' => $_POST['s_ID'],
        ':term' => $_POST['term'],
        ':math' => $_POST['math'],
        ':english' => $_POST['english'],
        ':hindi' => $_POST['hindi']));
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
<p>Add A New Record</p>
<form method="post">
<p>Student ID:
<input type="text" name="s_ID"></p>
<p>Term:
<input type="text" name="term"></p>
<p>Mathematics:
<input type="text" name="math"></p>
<p>Hindi:
<input type="text" name="hindi"></p>
<p>Emglish:
<input type="text" name="english"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
