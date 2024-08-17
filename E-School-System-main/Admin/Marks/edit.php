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



if ( isset($_POST['term']) && isset($_POST['id'])
     && isset($_POST['math']) && isset($_POST['hindi']) && isset($_POST['english']) ) {

    // Data validation
    if ( strlen($_POST['s_ID']) < 1 || strlen($_POST['term']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['s_ID']);
        return;
    }

    if ( strlen($_POST['s_ID']) > 4 ) {
        $_SESSION['error'] = 'User is Larger';
        header("Location: edit.php?user_id=".$_POST['s_ID']);
        return;
    }

    $sql = "UPDATE marks SET s_ID = :s_ID,
            term = :term, hindi = :hindi,
            english = :english, math = :math
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':s_ID' => $_POST['s_ID'],
        ':term' => $_POST['term'],
        ':hindi' => $_POST['hindi'],
        ':math' => $_POST['math'],
        ':id' => $_POST['id'],
        ':english' => $_POST['english']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM marks where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
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

$s_ID = htmlentities($row['s_ID']);
$t = htmlentities($row['term']);
$m = htmlentities($row['math']);
$h = htmlentities($row['hindi']);
$e = htmlentities($row['english']);
$id = htmlentities($row['id']);
?>
<p>Edit Marks</p>
<form method="post">
<p>ID:
<input type="text" name="id" value="<?= $id ?>"></p>
<p>Student ID:
<input type="text" name="s_ID" value="<?= $s_ID ?>"></p>
<p>Term:
<input type="text" name="term" value="<?= $t ?>"></p>
<p>Mathematics:
<input type="text" name="math" value="<?= $m ?>"></p>
<p>Hindi:
<input type="text" name="hindi" value="<?= $h ?>"></p>
<p>English:
<input type="text" name="english" value="<?= $e ?>"></p>
<input type="hidden" name="s_ID" value="<?= $s_ID ?>">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
