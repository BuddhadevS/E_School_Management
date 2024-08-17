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



    // Data validation
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
     $id = $_SESSION['user_name'];
        $date = $_POST['n_date'];
        $letter = $_POST['content'];
        // Update the record
        $stmt = $pdo->prepare('INSERT INTO leave_letter (user_ID, letter, n_date) VALUES (?, ?, ?);');
        $stmt->execute([$id, $letter, $date]);
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' );
    return;
    }

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<p>Write letter</p>
<form method="post">
<p>Date:
<input type="date" name="n_date"></p>
<p>Write Letter:
<input type="text" name="content"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
