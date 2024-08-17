

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">        <title>Contact us</title>
    

      </head>
      <body>
        
        <body class="bd">
          <header>
              <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                  <a class="navbar-brand" href="#">ERP</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about us.html">About Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Gallery.html">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/e-school%20system/Login_System/">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact_us.php" id="Contact Us">Contact Us</a>
                  </li>
        
              </ul>
                   
                  </div>
                </nav>
      
          </header>




  <section id="Contact Us">
    <div class="container mb-5">
        <h1 class="text-center text-capitalize pt-4">Contact Us</h1>
    <hr class="w-25 mx-auto pt-4">
<div class="w-50 mx-auto">

    <form method="post">
        <div class="form-group">
          <label for="Your Name">Your Name:</label>
          <input type="text" class="form-control" placeholder="Enter Your Name" id="email" name="name" autocomplete="off">
        </div> 
        <div class="form-group">
          <label for="email">Your Email:</label>
          <input type="email" class="form-control" placeholder="Enter Your Email" id="pwd" name="email">
        </div>

        <div class="form-group">
            <label for=" Number">Your Mobile No:</label>
            <input type="number" class="form-control" placeholder="Enter Your Mobile No" id="email" name="number" autocomplete="off">
          </div> 

          <div class="form-group">
            <label> Textarea </label>
                <Textarea class="form-control" name="query"></Textarea>
            
          </div>

        <button type="submit" class="btn btn-primary" onclick="msg()">Submit</button>
      </form>
      <script>
function msg() {
  alert("Details Submitted");
}
</script>

</div>

    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include 'pdo.php';
if ( isset($_SESSION['success']) ) {
  echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
  unset($_SESSION['success']);
}
if ( isset($_POST['number'])) {
$sql = "INSERT INTO register (name, email, number, query)
VALUES (:name, :email, :number, :query)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':name' => $_POST['name'],
':email' => $_POST['email'],
':number' => $_POST['number'],
':query' => $_POST['query']));
$_SESSION['success'] = 'From Submitted';
header( 'Location: contact_us.php' );
return;
}

?>
</html>