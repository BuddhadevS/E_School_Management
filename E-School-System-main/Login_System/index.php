<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Login</title>
<style>
body{

  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.img {
  /* The image used */
  background-image: url("loginlib.jpg");

  /* min-height: 380px; */
  height: 100vh;
  width: 100vw;

  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}


.container {
  position: absolute;
  right: 0;
  backdrop-filter: blur(2px);
  left: 450px; top: 100px;
  margin: 20px;
  max-width: 500px;
padding-right:20px;
  padding: 20px;


}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


.btn {
  background-color: black;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-weight:bold;

}

.btn:hover {
  opacity: 1;
}
h1{
    color:white;
}
p{
  color:white;
}

</style>




</head>
<body>



<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <a class="navbar-brand" href="http://localhost/e-school%20system/index.html">ERP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="http://localhost/e-school%20system/index.html">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/e-school%20system/about%20us.html">About Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/e-school%20system/Gallery.html">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/e-school%20system/contact_us.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/e-school%20system/Login_System/">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/e-school%20system/contact_us.php" id="Contact Us">Contact Us</a>
                  </li>
        
              </ul>
             
            </div>
          </nav>

    </header>

    <div class="img">

        <form action="login.php" method="post" class="container">
        <h1>Login</h1>
   

<?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>


<label style="color:white;font-weight:bold;">User Name</label>

<input type="text" name="uname" placeholder="User Name"><br>

<label style="color:white;font-weight:bold;">Password</label>

<input type="password" name="password" placeholder="Password"><br> 

<button type="submit" class="btn">Login</button>


</form>
</div>
</body>
</html> 