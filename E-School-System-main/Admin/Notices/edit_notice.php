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


// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if notice ID is provided
if (isset($_GET['id'])) {
    $notice_id = $_GET['id'];

    // Retrieve notice details from the database
    $sql = "SELECT * FROM notices WHERE id = $notice_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
    } else {
        echo "Notice not found.";
        exit;
    }
} else {
    echo "Invalid notice ID.";
    exit;
}

// Process form submission to update notice
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE notices SET title = '$title', content = '$content' WHERE id = $notice_id";
    if ($conn->query($sql) === TRUE) {
        echo "Notice updated successfully.";
        // Redirect to the notice details page after updating
        header("Location: index.php?id=$notice_id");
        exit;
    } else {
        echo "Error updating notice: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Notice</title>
</head>
<body style="background-image: linear-gradient(90deg , beige, #3e423b  );">
    <h2>Edit Notice</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $notice_id; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required><?php echo $content; ?></textarea>
        <br>
        <input type="submit" name="update" value="Update Notice">
    </form>
</body>
</html>