<?php
include '../../pdo.php';
session_start();
?>
<?php
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdebuttonvr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Fees Record</title>
</head>
<style>
  html{
    scroll-behavior: smooth;
  }
    body {
      margin: 0;
      width: 100vw;
      height: 100vh;
      /* background-image: url("D:/Downloads/pexels-min-an-694740.jpg");
      background-position: center;
      background-size: 1920px 1080px; */
      background-image: linear-gradient(90deg , beige, #3e423b  );
      display: flex;
      align-items: center;
      text-align: center;
      justify-content: center;
      place-items: center;
      overflow: hidden;
      font-family: poppins;
    }
    
    .container {
      position: relative;
      width: 1200px;
      height: 620px;
      border-radius: 20px;
      padding: 40px;
      box-sizing: border-box;
      background: #cbd6deb3;
      box-shadow: 7px 7px 10px #0a0a0a, -7px -7px 10px white;
    }
    
    table {
      border-collapse: collapse;
      width: 98%;
    }
    th{
        text-align: center;
        padding: 8px;
        background-color: gray;
        border-radius: 50px;
        box-shadow: inset 2px 2px 2px #c0c2c3, inset -2px -2px 2px rgb(5, 5, 5);
        margin: 5px;
        position: sticky;
    top: 0;
    }
    
    td {
      text-align: left;
      padding: 8px;
      border-radius: 50px;
      box-shadow: inset 2px 2px 2px #c0c2c3, inset -2px -2px 2px rgb(5, 5, 5);
        margin: 5px;
  /*box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;*/
    }
    
     tr:nth-child(even) {background-color: rgba(255, 255, 255, 0.618);}
    tr:nth-child(odd) {background-color: #90978985;} 
   /* tr {background-color: whitesmoke;}*/





    .inputs {
  text-align: left;
  margin-top: 50px;
}

label, input, button {
  display: block;
  width: 30%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

label {
  /* margin-bottom: 1px; */
  margin: 1px 1px 1px 1px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
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

button {
  color: rgb(14, 13, 13);
  margin-top: 20px;
  background: #1DA1F2;
  height: 30px;
  width : 100px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 2px 2px 2px #050505, -2px -2px 2px #dddfe2;
  transition: 0.5s;
  
}

button:hover {
  color:#fff;
background-color:#2335dfbd;
  box-shadow: none;
}






.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}


.row {margin: 0 -5px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
        </style>
</head>
<body>
<h1 style="  position: absolute; left: 630px; top: 0px;">Fees Record</h1>
<form method="post">
    <input type="submit" value="DashBoard" name="dashboard" 
    style="background : #1DA1F2; position: absolute; left: 10px; top: 10px; width : 100px;">
    </form>

    <div class="container">
    
       
        <div class="row">
        <?php
if($_SESSION['user_type'] == "admin" OR $_SESSION['user_type'] == "library"){?>
        <form method="post">
                    <label style="position: absolute; left: -100px; top: 35px;">Filter by Student ID:</label>
                    <input type="text" name="s_ID2" style="position: absolute; left: 150px; top: 30px;" >
           
                    <button class="btn"  type="submit" value="Search" name="Filter" 
                    style="position: absolute; left: 25px; top: 50px;"> Search</button>
                  
                    <button  class="btn" type="submit" value="Clear" name="Clear"
                    style="position: absolute; left: 140px; top: 50px;"> Clear</button>
    </form>


                    <button class="btn" style="background-color : #4CAF50;position: absolute; left: 25px; top: 90px; width : 150px;">
                    <a href="add.php" style="color : white;">Add New Fee Record</a></button>
<?php } ?>
 <br>
 <?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
if(isset($_POST['Filter']) AND !isset($_POST['Clear'])){
    $s_ID2 = $_POST['s_ID2'];
    $stmt = $pdo->prepare("SELECT *, student.Name FROM fees INNER JOIN student ON fees.s_ID = student.s_ID WHERE fees.s_ID = ?");
          $stmt->execute([$s_ID2]);
    }

elseif($_SESSION['user_type'] == "student" OR $_SESSION['user_type'] == "parent"){
    $stmt = $pdo->prepare("SELECT *, student.Name FROM fees INNER JOIN student ON fees.s_ID = student.s_ID WHERE student.s_ID = ? OR student.p_ID = ?");
         $stmt->execute([$_SESSION['user_name'], $_SESSION['user_name']]);
    }

else{
$stmt = $pdo->query("SELECT *, student.Name FROM fees INNER JOIN student ON fees.s_ID = student.s_ID");
}
?>
  <div style=" position: absolute; left : 10px; top : 180px; overflow-x: auto;">
      <div style=" height: 350px; overflow-x: auto;">
    <table>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Month Name</th>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Update(Edit/Delete)</th>
        
      </tr>
<?php
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      ?>
     <tr>
        <td><?php echo(htmlentities($row['s_ID'])); ?></td>
        <td><?php echo(htmlentities($row['Name'])); ?></td>
        <td><?php echo(htmlentities($row['month_Name']));?></td>
        <td><?php echo(htmlentities($row['transaction_ID']));?></td>
    <td><?php echo(htmlentities($row['amount']));?></td>
    <td><?php echo(htmlentities($row['date'])); ?></td>
    
 <td style="text-align: center;"><span><?php if($_SESSION['user_type'] == "admin" OR $_SESSION['user_type'] == "library" ){
    echo('<a href="edit.php?s_ID='.$row['s_ID'].'" style="color : green; ">Edit</a>');?></span><span>   /  
           </span><span><?php echo('<a href="delete.php?s_ID='.$row['s_ID'].'" style="color : red;">Delete</a>');}?></span></td>
       <?php
    echo  ("</tr>
      <tr>\n");}?>
    </table>
  </div>
  </div>
    
</body>
</html>