<style>
    button {
  margin-top: 20px;
  height: 20px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 2px 2px 2px #050505, -2px -2px 2px #dddfe2;
  transition: 0.5s;
  display: block;
  width: 7%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
  
}
input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 30px;
  font-size: 10px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px #168668e1;
}

button:hover {
  color:#fff;
background-color:#2335dfbd;
  box-shadow: none;
}
</style>
<body style="background-image: linear-gradient(90deg , beige, #3e423b  );">
    <?php
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
        header( 'Location: http://localhost/e-school%20system/Teachers/HomeIndexTeacher.php' ) ;
    }
    else if($_SESSION['user_type'] == "library"){
        header( 'Location: http://localhost/e-school%20system/Library/HomeIndexLibraryAdmin.php' ) ;
    }
else{
        header( 'Location: http://localhost/e-school%20system/' ) ;
    }
}

if($_SESSION['user_type'] == "admin"){
    echo('<div style="right: auto|length|initial|inherit;">
    <button style="background: #1DA1F2;"><a href="add_notice.php" style="color: black;">Add New Notice </a><button>
    </div>');
}
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_school_system";


// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a new notice
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO notices (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "Notice created successfully.";
    } else {
        echo "Error creating notice: " . $conn->error;
    }
}

// Read notices from the database
$sql = "SELECT * FROM notices ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notice_id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $created_at = $row['created_at'];

        echo "<h3 >$title</h3>";
        echo "<p>Created on: $created_at</p>";
        echo "<p>$content</p>";

        // Update a notice

if($_SESSION['user_type'] == "admin"){
        echo "<button style='background: green; display: inline-block; '><a href='edit_notice.php?id=$notice_id' style='color: black;'>Edit</a></button> / ";

        // Delete a notice
        echo ("<button style='background: red; display: inline-block; '><a href='delete_notice.php?id=$notice_id' style='color: black;'>Delete</a></button>");

        echo "<hr>";
}
    }
} else {
    echo "No notices found.";
}

// Close the database connection
$conn->close();
?>
</body>