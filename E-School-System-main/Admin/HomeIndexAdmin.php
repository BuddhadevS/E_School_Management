<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']))

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Admin</title>
    <style>


.card{
    border-radius: 40px;
}
        body {
  margin: 0;
  width: 100vw;
  height: 100vh;
  background-image: url("loginlib.jpg");
  background-size: 1920px 1080px;
  background-color: linear-gradient(90deg , #b6cdaee3 ,rgb(4, 92, 97) );
  
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
  width: 550px;
  height: 600px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #e5f9d6c7;
}
.brand-logo {
  height: 100px;
  width: 100px;
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px rgb(4, 92, 97), -7px -7px 10px white;
}
img{
    height: 100px;
  width: 100px;
  border-radius: 50%;
}
.brand-title {
  margin-top: 10px;
  font-weight: 900;
  font-size: 1.8rem;
  
  letter-spacing: 1px;
}

.inputs {
  text-align: left;
  margin-top: 30px;
}

.card-body {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

label {
  margin-bottom: 4px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

p {
  background: white;
  padding: 10px;
  padding-left: 20px;
  height: 40px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px white, inset -6px -6px 6px rgb(4, 92, 97);
}







@import url(//netdna.bootstrapcdn.com/font-awesome/6.4.0/css/font-awesome.css);

@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

.logo{
  
}

.settings {
  
  height:73px; 
  float:left;
  background:url( https://s3.postimg.org/bqfooag4z/startific.jpg);
  background-repeat:no-repeat;
  width:250px;
  margin:0px;
 text-align: center;
font-size:20px;
font-family: 'Strait', sans-serif;

}






/* ScrolBar  */
.scrollbar
{

height: 90%;
width: 100%;
overflow-y: hidden;
overflow-x: hidden;
}

.scrollbar:hover
{

height: 90%;
width: 100%;
overflow-y: scroll;
overflow-x: hidden;
}

/* Scrollbar Style */ 



#style-1::-webkit-scrollbar-track
{
border-radius: 2px;
}

#style-1::-webkit-scrollbar
{
width: 5px;
background-color: #F7F7F7;
}

#style-1::-webkit-scrollbar-thumb
{
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
background-color: #BFBFBF;
}
/* Scrollbar End */ 




.fa-lg {
font-size: 1em;
  
}
.fa {
position: relative;
display: table-cell;
width: 55px;
height: 36px;
text-align: center;
top:12px; 
font-size:20px;

}
.fas{
    position: relative;
display: table-cell;
width: 55px;
height: 36px;
text-align: center;
top:12px; 
font-size:20px;
}
.fa-solid{
    position: relative;
display: table-cell;
width: 55px;
height: 36px;
text-align: center;
top:12px; 
font-size:20px;
}



.main-menu:hover, nav.main-menu.expanded {
width:250px;
overflow:hidden;
opacity:1;

}

.main-menu {
background:#080808;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:55px;
overflow:hidden;
-webkit-transition:width .2s linear;
transition:width .2s linear;
-webkit-transform:translateZ(0) scale(1,1);
box-shadow: 1px 0 15px rgba(9, 135, 149, 0.07);
  opacity:1;
}

.main-menu>ul {
margin:7px 0;

}

.main-menu li {
position:relative;
display:block;
width:250px;
  


}

.main-menu li>a {
position:relative;
width:255px;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#e5f1c1fc;
font-size: 15px;
font-weight: bold;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .14s linear;
transition:all .14s linear;
font-family: 'Strait', sans-serif;
border-top:1px solid #080808;

/*text-shadow: 1px 1px 1px  #fff;  */
}



.main-menu .nav-icon {
  
position:relative;
display:table-cell;
width:55px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;

}

.main-menu .nav-text  {
   
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
font-family: 'Titillium Web', sans-serif;
}

.main-menu .share {
}



.main-menu .fb-like {

left: 180px;
position:absolute;
top: 15px;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
  
}

.no-touch .scrollable.hover {
overflow-y:hidden;

}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
  
}


/* Logo Hover Property */


.settings:hover, settings:focus {   
  background:url( https://s17.postimg.org/74cl7s05b/logo_hover.jpg);
  -webkit-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0; 
}

.settings:active, settings:focus {   
  background:url( https://s3.postimg.org/bqfooag4z/startific.jpg);
  -webkit-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0; 
}


a:hover,a:focus {
text-decoration:none;
border-left:0px solid #F7F7F7;



}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
  
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
text-transform: uppercase;
}




.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#b5ccccbd;
text-shadow: 0px 0px 0px; 
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}


    </style>
</head>
<body>
<h1 style="  position: absolute; left: 630px; top: 10px; 
   border-radius: 10px;
  padding: 5px;
  box-sizing: border-box;
  background: #e5f9d6c7;">
  Welcome Admin </h1>
  
      <nav class="main-menu">


  
        <div>
           <a class="logo" href="http://startific.com">
           </a> 
         </div> 
       <div class="settings"></div>
       <div class="scrollbar" id="style-1">
             
       <ul>
         
       <li>                                   
       <a href="http://localhost/e-school%20system/Admin/HomeIndexAdmin.php">
       <i class="fa fa-home fa-lg"></i>
       <span class="nav-text">Home</span>
       </a>
       </li>   
          
       <li>                                 
       <a href="http://localhost/e-school%20system/crud/crud_Student/">
       <i class="fa fa-user fa-lg"></i>
       <span class="nav-text">Student</span>
       </a>
       </li>   
       
           
       <li>                                 
       <a href="http://localhost/E-School%20System/Attendance/index.php">
       <i class="fa fa-clipboard-user fa-lg"></i>
       <span class="nav-text">Attendance</span>
       </a>
       </li>   
         
       
       
        
       
       <li >
       <a href="http://localhost/E-School%20System/Admin/Marks/index.php">
       <i class="fas fa-chart-bar fa-lg"></i>
       <span class="nav-text">Marks</span>
       </a>
       </li>
       <li>
       <a href="http://localhost/e-school%20system/Admin/Routine/">
       <i class="fa fa-desktop fa-lg"></i>
       <span class="nav-text">Routine</span>
       </a>
       </li>
         
       <li >
       <a href="http://localhost/e-school%20system/crud/crud_Teacher/">
       <i class="fa fa-person-chalkboard fa-lg"></i>
       <span class="nav-text">Teachers</span>
       </a>
       </li>
         
       <li >
       <a href="http://localhost/e-school%20system/crud/crud_Parent/">
       <i class="fa-solid fa-person fa-lg"></i>
        <span class="nav-text">Parents</span>
       </a>
       </li>
         
       <li >
       <a href="http://localhost/e-school%20system/Library/Book%20Record/">
           <i class="fa fa-book fa-lg"></i>
       <span class="nav-text">library</span>
       </a>
       </li>
       
       <li >
       <a href="http://localhost/e-school%20system/admin/notices/index.php">
           <i class="fas fa-bell fa-lg"></i>
       <span class="nav-text">Notice</span>
       </a>
       </li>
         
       <li >
       <a href="http://localhost/e-school%20system/Admin/Fee/">
           <i class="fa fa-money-check-dollar fa-lg"></i>
       <span class="nav-text">Fee</span>
       </a>
       </li>
       
       <li >
       <a href="http://localhost/e-school%20system/Admin/Leave_Letters/">
           <i class="fa fa-envelope fa-lg"></i>
       <span class="nav-text">Leave Letters
       </span>
       </a>
       </li>
         
       <li >
       <a href="http://localhost/e-school%20system/Login_System/logout.php">
           <i class="fa fa-right-from-bracket fa-flip-horizontal fa-lg"></i>
       <span class="nav-text">logout</span>
       </a>
       </li>
       
       </ul>
               </nav>
    <div class="container">
        <div class="brand-logo">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['image']).' " >';?>
        </div>
        <div class="brand-title"><?php echo ($_SESSION['name']);?></div>
        <br><br>

        <div class="row">
            <div class="col-sm-12 ">
                <label>User ID</label>
              <div class="card">
                <div class="card-body">
                    
                  <p class="card-text"><?php echo ($_SESSION['user_name']);?></p>
                 
                </div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-12 ">
                <label>Name</label>
              <div class="card">
                <div class="card-body">
                    
                  <p class="card-text"><?php echo ($_SESSION['name']);?></p>
                 
                </div>
              </div>
            </div>
            
          </div>
        

        </div>
    
</body>
</html>