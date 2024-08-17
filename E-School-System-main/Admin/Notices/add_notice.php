<style>
  body {background-image: linear-gradient(90deg , beige, #3e423b  );}
  </style>
<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_school_system";
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
else if($_SESSION['user_type'] == "parent"){
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


// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission to add a notice
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert the notice into the database
    $sql = "INSERT INTO notices (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color:Green;">Notice added successfully.</p>';
        header( 'Location: index.php' ) ;
    } else {
        echo "Error adding notice: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Notice</title>
</head>
<body style="background-image: linear-gradient(90deg , beige, #3e423b  );">
    <h2>Add Notice</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
        <br>
        <input type="submit" name="add" value="Add Notice">
    </form>
</body>
</html>