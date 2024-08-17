<?php
include '../../pdo.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Marks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        p {
            margin-bottom: 10px;
        }
  body {background-image: linear-gradient(90deg , beige, #3e423b  );}
    </style>
</head>
<body>
    <form method="post">
        <input type="submit" value="Dashboard" name="dashboard">
    </form>

    <?php
    if (isset($_POST['dashboard'])) {
        if ($_SESSION['user_type'] == "admin") {
            header('Location: http://localhost/e-school%20system/Admin/HomeIndexAdmin.php');
        } else if ($_SESSION['user_type'] == "student") {
            header('Location: http://localhost/e-school%20system/Student/HomeIndexStudent.php');
        } else if ($_SESSION['user_type'] == "teacher") {
            header('Location: http://localhost/e-school%20system/Parent/HomeIndexParent.php');
        } else if ($_SESSION['user_type'] == "teacher") {
            header('Location: http://localhost/e-school%20system/teacher/HomeIndexteacher.php');
        } else if ($_SESSION['user_type'] == "library") {
            header('Location: http://localhost/e-school%20system/Library/HomeIndexLibraryAdmin.php');
        } else {
            header('Location: http://localhost/e-school%20system/');
        }
    }

    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $sql = "DELETE FROM marks WHERE id = :zip";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':zip' => $_POST['id']));
        $_SESSION['success'] = 'Record deleted';
        header('Location: index.php');
        return;
    }

    // Guardian: Make sure that user_id is present
    if (!isset($_GET['id'])) {
        $_SESSION['error'] = "Missing user_id";
        header('Location: index.php');
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM marks where id = :xyz");
    $stmt->execute(array(":xyz" => $_GET['id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        $_SESSION['error'] = 'Bad value for user_id';
        header('Location: index.php');
        return;
    }
    ?>

    <p>Confirm: Deleting Marks of Student ID : <?= htmlentities($row['s_ID']) ?></p>

    <form method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="submit" value="Delete" name="delete">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
