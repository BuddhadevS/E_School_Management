<?php
$pdo = new PDO('mysql:host=localhost;dbname=e_school_system', 
   'rootz', '');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

